<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaportsTable extends Migration
{
    public function up()
    {
        Schema::create('raports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data')->nullable();
            $table->time('start')->nullable();
            $table->time('stop')->nullable();
            $table->time('work')->nullable();
            $table->string('engine')->nullable();
            $table->string('gps_kraj')->nullable();
            $table->string('gps_woj')->nullable();
            $table->string('gps_city')->nullable();
            $table->string('gps_ulica')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
