<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::table('question')->insert(array(
        'question' => 'question1',
        'answer_id'=> 1,
        'correct_answer' => 'answer1',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));




         
        DB::table('question')->insert(array(
        'question' => 'question2',
        'answer_id'=> 2,
        'correct_answer' => 'answer12',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));

//newcomment
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
