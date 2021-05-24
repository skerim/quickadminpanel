<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('name_2')->nullable();
            $table->integer('nip')->nullable();
            $table->string('street')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
