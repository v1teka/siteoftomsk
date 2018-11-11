<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborsFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE FUNCTION neighbors( point_id INT(10) ) RETURNS VARCHAR(500) BEGIN
        DECLARE val VARCHAR(100);
        
        SELECT GROUP_CONCAT(id)
        into val
        from points
        where distance(id, point_id) < 300
        and type_id = (SELECT type_id
                    FROM points
                    WHERE id=point_id)
           and deleted_at is NULL;
        
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
        DB::unprepared('DROP FUNCTION IF EXISTS neighbors');
    }
}
