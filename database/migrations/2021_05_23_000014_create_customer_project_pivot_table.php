<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('customer_project', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_3934169')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_3934169')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
