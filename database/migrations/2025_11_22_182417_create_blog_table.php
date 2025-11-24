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
        Schema::create('blog', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('subject')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('tags')->nullable()->default(null);
            $table->longText('description')->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
};
