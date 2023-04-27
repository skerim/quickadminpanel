<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLiniesTable extends Migration
{
    public function up()
    {
        Schema::table('linies', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_8393236')->references('id')->on('cranes');
        });
    }
}
