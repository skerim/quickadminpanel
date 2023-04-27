<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSupportsTable extends Migration
{
    public function up()
    {
        Schema::table('supports', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_8391488')->references('id')->on('cranes');
            $table->unsignedBigInteger('kontrahent_id')->nullable();
            $table->foreign('kontrahent_id', 'kontrahent_fk_8391491')->references('id')->on('customers');
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->foreign('transport_id', 'transport_fk_8393960')->references('id')->on('transports');
        });
    }
}
