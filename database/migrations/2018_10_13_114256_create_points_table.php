<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->float('x', 9, 5);
            $table->float('y', 9, 5);

            $table->string('description', 255);
            $table->string('image', 255)->nullable();
            $table->boolean('moderated')->nullable()->default(null);
            $table->timestamp('published_at')->nullable()->default(null);
            $table->timestamps();
    
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
    
            $table->boolean('isPositive')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
