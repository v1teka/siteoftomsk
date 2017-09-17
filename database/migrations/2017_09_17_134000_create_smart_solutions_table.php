<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmartSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('smart_section_id')->unsigned();
            $table->text('description');
            $table->boolean('visible')->default(true);

            $table->foreign('smart_section_id')->references('id')->on('smart_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smart_solutions');
    }
}
