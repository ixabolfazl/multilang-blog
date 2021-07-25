<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->unique();
            $table->string('site_name');
            $table->string('description');
            $table->string('logo_url');
            $table->unsignedBigInteger('breaking_title_category');
            $table->foreign('breaking_title_category')->references('id')->on('categories');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('about');
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
        Schema::dropIfExists('settings');
    }
}
