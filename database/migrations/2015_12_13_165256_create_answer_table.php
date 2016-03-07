<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('answer', function($table) {
	 $table -> increments('answer_id');
	 $table-> string('answer');
    $table->integer('question_id')->unsigned();
;
     $table -> boolean('correct_answer');
     $table->timestamps();
	});
    Schema::table('answer', function($table) {
     $table->foreign('question_id')->references('question_id')->on('question')->onDelete('cascade');
    });

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('answer');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
