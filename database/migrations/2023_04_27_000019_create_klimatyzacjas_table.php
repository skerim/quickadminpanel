<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlimatyzacjasTable extends Migration
{
    public function up()
    {
        Schema::create('klimatyzacjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->date('data_montazu')->nullable();
            $table->date('data_konserwacji')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
