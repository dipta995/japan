<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentposts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->integer('div_id');
            $table->string('agent_id');
            $table->string('title');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->string('price');
            $table->longText('overview');
            $table->string('location');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agentposts');
    }
}
