<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaintenancesTable extends Migration
{
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id');
            $table->foreign('crane_id', 'crane_fk_3981072')->references('id')->on('cranes');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_3981073')->references('id')->on('projects');
            $table->unsignedBigInteger('conservator_id')->nullable();
            $table->foreign('conservator_id', 'conservator_fk_3981075')->references('id')->on('users');
        });
    }
}
