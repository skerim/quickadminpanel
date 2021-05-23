<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('rental_start')->nullable();
            $table->date('rental_end')->nullable();
            $table->string('name_crane')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
