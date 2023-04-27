<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_3934154')->references('id')->on('projects');
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_6254968')->references('id')->on('cranes');
        });
    }
}
