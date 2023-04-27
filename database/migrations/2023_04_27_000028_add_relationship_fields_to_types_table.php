<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTypesTable extends Migration
{
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->unsignedBigInteger('producer_id')->nullable();
            $table->foreign('producer_id', 'producer_fk_4121974')->references('id')->on('producers');
        });
    }
}
