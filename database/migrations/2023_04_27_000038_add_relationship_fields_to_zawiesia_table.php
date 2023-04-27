<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZawiesiaTable extends Migration
{
    public function up()
    {
        Schema::table('zawiesia', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_8393742')->references('id')->on('cranes');
        });
    }
}
