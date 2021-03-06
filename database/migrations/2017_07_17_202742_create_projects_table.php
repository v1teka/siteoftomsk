<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title', 255);
        $table->string('description', 255);
        $table->text('content');
        $table->string('image', 255)->nullable();
        $table->text('form')->nullable();
        $table->boolean('moderated')->nullable()->default(null);
        $table->timestamp('published_at')->nullable()->default(null);
        $table->timestamps();

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');

        $table->integer('rubric_id')->unsigned()->nullable();
        $table->foreign('rubric_id')->references('id')->on('rubrics')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('projects');
    }
}
