<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServisTable extends Migration
{
    public function up()
    {
        Schema::table('servis', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_8394035')->references('id')->on('cranes');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_8394036')->references('id')->on('projects');
            $table->unsignedBigInteger('conservator_id')->nullable();
            $table->foreign('conservator_id', 'conservator_fk_8394037')->references('id')->on('users');
        });
    }
}
