<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::dropIfExists('payment');
        
        // Create comprehensive subscriptions table
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('package_id')->default(0);
            $table->string('paypal_agreement_id')->unique();
            $table->string('paypal_plan_id');
            $table->string('status')->default('active'); // active, suspended, cancelled, expired
            $table->decimal('amount', 8, 2);
            $table->string('currency')->default('USD');
            $table->string('frequency')->default('yearly');
            $table->integer('memorials_count');
            $table->integer('memorials_used')->default(0);
            $table->timestamp('start_date');
            $table->timestamp('next_billing_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->text('agreement_details')->nullable(); // Store full PayPal response
            $table->text('payment_response')->nullable(); // Store payment details
            $table->string('card_type', 50)->nullable(); // Payment method
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'status']);
            $table->index('next_billing_date');
            $table->index('package_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
