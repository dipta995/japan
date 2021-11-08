<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalalfoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halalfoods', function (Blueprint $table) {
            $table->id();
            $table->integer('div_id');
            $table->integer('subdiv_id');
            $table->string('resturent_name');
            $table->string('location');
            $table->string('image');
            $table->string('link');

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
        Schema::dropIfExists('halalfoods');
    }
}
