<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subscription';

    protected $fillable = [
        'user_id',
        'package_id',
        'paypal_agreement_id',
        'paypal_plan_id',
        'status',
        'amount',
        'currency',
        'frequency',
        'memorials_count',
        'memorials_used',
        'start_date',
        'next_billing_date',
        'end_date',
        'agreement_details',
        'payment_response',
        'card_type'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'datetime',
        'next_billing_date' => 'datetime',
        'end_date' => 'datetime',
        'agreement_details' => 'array',
        'payment_response' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the user that owns the subscription
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the PayPal plan associated with this subscription
     */
    public function paypalPlan()
    {
        return $this->belongsTo(PaypalPlan::class, 'paypal_plan_id', 'paypal_plan_id');
    }

    /**
     * Scope active subscriptions
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope subscriptions by user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Check if subscription is active
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Check if subscription is expired
     */
    public function isExpired()
    {
        return $this->status === 'expired' || 
               ($this->end_date && $this->end_date->isPast());
    }

    /**
     * Check if subscription is cancelled
     */
    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    /**
     * Get available memorials count
     */
    public function getAvailableMemorialsAttribute()
    {
        return $this->memorials_count - $this->memorials_used;
    }

    /**
     * Check if user can create more memorials
     */
    public function canCreateMemorial()
    {
        return $this->isActive() && $this->available_memorials > 0;
    }

    /**
     * Increment memorial usage
     */
    public function incrementMemorialUsage()
    {
        if ($this->memorials_used < $this->memorials_count) {
            $this->increment('memorials_used');
            return true;
        }
        return false;
    }

    /**
     * Decrement memorial usage
     */
    public function decrementMemorialUsage()
    {
        if ($this->memorials_used > 0) {
            $this->decrement('memorials_used');
            return true;
        }
        return false;
    }

    /**
     * Cancel subscription
     */
    public function cancel()
    {
        $this->update([
            'status' => 'cancelled',
            'end_date' => now()
        ]);
    }

    /**
     * Suspend subscription
     */
    public function suspend()
    {
        $this->update(['status' => 'suspended']);
    }

    /**
     * Activate subscription
     */
    public function activate()
    {
        $this->update(['status' => 'active']);
    }

    /**
     * Get agreement details as array
     */
    public function getAgreementDetails()
    {
        return $this->agreement_details ?: [];
    }

    /**
     * Get payment response as array
     */
    public function getPaymentResponse()
    {
        return $this->payment_response ?: [];
    }

    /**
     * Find subscription by PayPal agreement ID
     */
    public static function findByAgreementId($agreementId)
    {
        return static::where('paypal_agreement_id', $agreementId)->first();
    }

    /**
     * Get current active subscription for user
     */
    public static function getActiveForUser($userId)
    {
        return static::forUser($userId)->active()->first();
    }
}
