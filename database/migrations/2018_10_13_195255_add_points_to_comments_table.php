<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPointsToCommentsTable extends Migration
{
    
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->renameColumn("project_id", "target_id");
            $table->boolean('point_comment')->default(false);
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->renameColumn("target_id", "project_id");
            $table->dropColumn('point_comment');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }
}
