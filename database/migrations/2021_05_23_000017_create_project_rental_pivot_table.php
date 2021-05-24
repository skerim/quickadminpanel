<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectRentalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_rental', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_3937439')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id', 'rental_id_fk_3937439')->references('id')->on('rentals')->onDelete('cascade');
        });
    }
}
