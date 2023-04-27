<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZawiesiaTable extends Migration
{
    public function up()
    {
        Schema::create('zawiesia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nr')->nullable();
            $table->string('klasa')->nullable();
            $table->date('expiration_date');
            $table->string('load');
            $table->float('length', 15, 2)->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
