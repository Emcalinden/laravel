<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('question', function($table) {
	 $table -> increments('question_id');
	 $table->integer('answer_id')->length(10)->unsigned();
	 $table->string('question');
	 $table->string('correct_answer');
	 $table->string('difficulty');
     $table->timestamps();
	});
	 Schema::table('question', function($table) {
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
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::drop('question');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
