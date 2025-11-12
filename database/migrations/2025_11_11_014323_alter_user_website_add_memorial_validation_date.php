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
        Schema::table('user_website', function (Blueprint $table) {
            $table->bigInteger('subscription_id')->default(0);
            $table->boolean('is_trial')->default(true);
            $table->timestamp('next_billing_date')->default(now()->addDays(15));
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_website', function (Blueprint $table) {
            $table->dropColumn(['is_trial', 'next_billing_date', 'subscription_id', 'is_active']);
        });
    }
};
