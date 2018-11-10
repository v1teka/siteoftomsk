<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToPointsTable extends Migration
{
    public function up()
    {
        Schema::table('points', function (Blueprint $table) {
            //$table->integer('type_id')->default(0)->unsigned();
            $table->foreign('type_id')->references('id')->on('point_types');
        });
    }
    
    public function down()
    {
        Schema::table('points', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
    }
}
