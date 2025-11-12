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
        Schema::create('package', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->text('details')->nullable()->default(null);
            $table->boolean('tribute_page')->nullable()->default(1);
            $table->boolean('secure_access')->nullable()->default(1);
            $table->boolean('decease_bio')->nullable()->default(1);
            $table->boolean('flower_donation')->nullable()->default(1);
            $table->boolean('image_gallery')->nullable()->default(1);
            $table->boolean('automated_anniversary_reminder')->nullable()->default(0);
            $table->boolean('virtual_anniversary')->nullable()->default(0);
            $table->boolean('tribute_notes')->nullable()->default(0);
            $table->boolean('grave_img')->nullable()->default(0);
            $table->boolean('link_to_grave_site')->nullable()->default(0);
            $table->boolean('link_to_relative_page')->nullable()->default(0);
            $table->boolean('link_wife_to_husband')->nullable()->default(0);
            $table->boolean('merge_wife_and_husband')->nullable()->default(0);
            $table->boolean('dedicated_page')->nullable()->default(0);
            $table->boolean('search_by_name')->nullable()->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package');
    }
};
