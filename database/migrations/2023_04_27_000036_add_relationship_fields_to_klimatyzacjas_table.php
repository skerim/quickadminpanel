<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKlimatyzacjasTable extends Migration
{
    public function up()
    {
        Schema::table('klimatyzacjas', function (Blueprint $table) {
            $table->unsignedBigInteger('crane_id')->nullable();
            $table->foreign('crane_id', 'crane_fk_8391496')->references('id')->on('cranes');
        });
    }
}
