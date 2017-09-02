<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoorUserGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('door_user_grants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('door');
            $table->foreign('door')->references('id')->on('doors');
            $table->integer('door_user');
            $table->foreign('door_user')->references('id')->on('door_users');
            $table->json('grants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('door_user_grants');
    }
}
