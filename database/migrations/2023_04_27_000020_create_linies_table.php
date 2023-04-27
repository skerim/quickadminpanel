<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiniesTable extends Migration
{
    public function up()
    {
        Schema::create('linies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('diameter', 15, 2);
            $table->string('dostawca')->nullable();
            $table->float('length', 15, 2);
            $table->string('certificate')->nullable();
            $table->string('stan')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
