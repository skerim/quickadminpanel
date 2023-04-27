<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCranesTable extends Migration
{
    public function up()
    {
        Schema::create('cranes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sn')->unique();
            $table->string('year');
            $table->string('udt')->nullable();
            $table->string('enova')->nullable();
            $table->string('color')->nullable();
            $table->integer('max_load')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
