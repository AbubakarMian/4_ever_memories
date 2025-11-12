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
        Schema::create('paypal_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->default(0);
            $table->string('paypal_plan_id')->unique();
            $table->decimal('amount', 8, 2);
            $table->integer('memorials_count');
            $table->string('plan_name');
            $table->boolean('active')->default(1);
            $table->timestamps();
            
            $table->index('package_id');
            $table->index('active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paypal_plans');
    }
};
