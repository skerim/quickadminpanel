<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCranesTable extends Migration
{
    public function up()
    {
        Schema::table('cranes', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_3927370')->references('id')->on('types');
            $table->unsignedBigInteger('producer_id')->nullable();
            $table->foreign('producer_id', 'producer_fk_3927372')->references('id')->on('producers');
            $table->unsignedBigInteger('crane_class_id')->nullable();
            $table->foreign('crane_class_id', 'crane_class_fk_8391457')->references('id')->on('craneclasses');
        });
    }
}
