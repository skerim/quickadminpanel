<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRaportsTable extends Migration
{
    public function up()
    {
        Schema::table('raports', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_sn_id')->nullable();
            $table->foreign('crane_sn_id', 'crane_sn_fk_6487230')->references('id')->on('cranes');
        });
    }
}
