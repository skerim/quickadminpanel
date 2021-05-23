<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start')->nullable();
            $table->datetime('stop')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
