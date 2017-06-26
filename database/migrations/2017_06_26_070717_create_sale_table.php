<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->nullable();
            $table->string('images')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('tax')->nullable();
            $table->string('area')->nullable();
            $table->string('count_rooms')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('ceiling_height')->nullable();
            $table->string('type_of_building')->nullable();
            $table->string('condition')->nullable();
            $table->string('price')->nullable();
            $table->string('facilities')->nullable();
            $table->string('more_info')->nullable();
            $table->string('contact_detalis')->nullable();
            $table->string('video')->nullable();
            $table->string('role')->nullable();
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
        Schema::drop('sale');
    }
}
