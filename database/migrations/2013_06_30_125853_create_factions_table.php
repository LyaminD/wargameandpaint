<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factions', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('jeu_id');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('jeu_id')->references('id')->on('jeux');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factions');
    }
}
