<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenthousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renthouses', function (Blueprint $table) {
            $table->increments('rent_id');
            $table->integer('div_id');
            $table->integer('customer_id');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->string('price');
            $table->string('phone');
            $table->string('room');
            $table->string('person');
            $table->string('location');
            $table->longText('details');
            $table->tinyInteger('muslim');
            
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
        Schema::dropIfExists('renthouses');
    }
}
