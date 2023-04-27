<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('end')->nullable();
            $table->date('start')->nullable();
            $table->string('hp')->nullable();
            $table->string('lw_jb')->nullable();
            $table->string('location')->nullable();
            $table->string('monters')->nullable();
            $table->string('hydr')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
