<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('user_result', function($table) {
    $table-> increments('result_id');
    $table->integer('user_id')->unsigned();
    $table->integer('result');
    $table->timestamps();
});
     Schema::table('user_result', function($table) {
     $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
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
