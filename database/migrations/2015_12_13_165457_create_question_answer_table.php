<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
     Schema::create('question_answer', function($table) {
     $table->integer('question_id')->length(10)->unsigned();
	 $table->integer('answer_id')->length(10)->unsigned();
	 //$table->integer('result_id')->length(10)->unsigned();
		});

     Schema::table('question_answer', function($table) {
     $table->foreign('question_id')->references('question_id')->on('question')->onDelete('cascade');
	 $table->foreign('answer_id')->references('answer_id')->on('answer')->onDelete('cascade');
	 //$table->foreign('result_id')->references('result_id')->on('result')->onDelete('cascade');
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
    Schema::drop('question_answer');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
