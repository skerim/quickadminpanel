<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraneRentalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crane_rental', function (Blueprint $table) {
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id', 'rental_id_fk_3934118')->references('id')->on('rentals')->onDelete('cascade');
            $table->unsignedBigInteger('crane_id');
            $table->foreign('crane_id', 'crane_id_fk_3934118')->references('id')->on('cranes')->onDelete('cascade');
        });
    }
}
