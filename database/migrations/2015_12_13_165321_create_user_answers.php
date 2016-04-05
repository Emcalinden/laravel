<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('user_answer', function($table) {
    $table-> increments('user_answer_id');
    $table->integer('user_id')->unsigned();
    $table->integer('answer_id')->unsigned();
    $table->timestamps();
    });
     Schema::table('user_answer', function($table) {
     $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
     $table->foreign('answer_id')->references('answer_id')->on('answer')->onDelete('cascade');

    });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
