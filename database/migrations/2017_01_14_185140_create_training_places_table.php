<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_type_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('created_by')->default(1);
            $table->timestamps();
            $table->boolean('available')->default(true);
        });

        Schema::table('training_places', function (Blueprint $table) {
            $table->foreign('place_type_id')->references('id')->on('places_types');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_places');
    }
}
