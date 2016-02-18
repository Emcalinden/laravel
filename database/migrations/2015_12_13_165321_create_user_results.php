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
     $table-> integer('id')->length(10)->unsigned();
	 $table-> integer('result_id')->length(10)->unsigned();
		});

     Schema::table('user_result', function($table) {
     $table->foreign('id')->references('id')->on('user')->onDelete('cascade');
	 $table->foreign('result_id')->references('result_id')->on('result')->onDelete('cascade');
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
