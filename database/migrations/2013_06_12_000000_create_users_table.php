<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo')->unique();
            $table->string('email')->unique();
            $table->string('jeux')->nullable();
            $table->string('armées')->nullable();
            $table->string('liens')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('imageprofil')->default('avatar.jpg');
            $table->string('password');
            $table->unsignedBigInteger('role_id')->default(1);
            $table->unsignedBigInteger('image_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('role_id')->references('id')->on('roles');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
