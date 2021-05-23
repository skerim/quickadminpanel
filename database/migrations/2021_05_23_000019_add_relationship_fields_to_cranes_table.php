<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCranesTable extends Migration
{
    public function up()
    {
        Schema::table('cranes', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id', 'type_fk_3927370')->references('id')->on('types');
            $table->unsignedBigInteger('producer_id');
            $table->foreign('producer_id', 'producer_fk_3927372')->references('id')->on('producers');
        });
    }
}
