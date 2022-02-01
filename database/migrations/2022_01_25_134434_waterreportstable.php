<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Waterreportstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waterreports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('bd_name');
            $table->string('tds_tap');
            $table->string('tds_ro');
            $table->string('tds_jar');
            $table->string('ph_tap');
            $table->string('ph_ro');
            $table->string('ph_jar');
            $table->string('flow');
            $table->string('installed_ro');
            $table->string('purifier');
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
        Schema::dropIfExists('waterreports');
    }
}
