<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'paypal_plan_id',
        'amount',
        'memorials_count',
        'plan_name',
        'active'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Scope active plans
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Find plan by package ID and amount
     */
    public static function findByPackageAndAmount($packageId, $amount)
    {
        return static::where('package_id', $packageId)
                    ->where('amount', $amount)
                    ->active()
                    ->first();
    }

    /**
     * Deactivate this plan
     */
    public function deactivate()
    {
        $this->update(['active' => false]);
    }

    /**
     * Check if plan is active
     */
    public function isActive()
    {
        return $this->active === true;
    }
}
