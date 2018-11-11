<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistanceFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION distance( pointA INT(10), pointB INT(10) ) RETURNS DOUBLE
        BEGIN
DECLARE val DOUBLE;
DECLARE fromX DOUBLE;
DECLARE fromY DOUBLE;
DECLARE toX DOUBLE;
DECLARE toY DOUBLE;
SELECT x INTO fromX FROM points WHERE id = pointA;
SELECT y INTO fromY FROM points WHERE id = pointA;
SELECT x INTO toX FROM points WHERE id = pointB;
SELECT y INTO toY FROM points WHERE id = pointB;
SET val = 100000*SQRT((fromX-toX)*(fromX-toX)+(fromY-toY)*(fromY-toY));
RETURN val;
END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS distance');
    }
}
