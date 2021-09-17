<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->text('titre');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('faction_id');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('user_id')->references('id')->on('users')->onDelete("set null");
            $table->foreign('faction_id')->references('id')->on('factions');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
