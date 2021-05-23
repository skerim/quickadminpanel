<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('name_2')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('enowa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
