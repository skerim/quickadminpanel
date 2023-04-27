<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_type_id')->nullable();
            $table->foreign('crane_type_id', 'crane_type_fk_7912558')->references('id')->on('types');
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_7912559')->references('id')->on('cranes');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_7891438')->references('id')->on('task_statuses');
            $table->unsignedBigInteger('kontrahent_id')->nullable();
            $table->foreign('kontrahent_id', 'kontrahent_fk_7912565')->references('id')->on('customers');
        });
    }
}
