<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('answer')->insert(array(
        'answer' => 'answer here',
        'question_id'=>1,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => 'answer here 2',
        'question_id'=>1,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => 'answer here 3',
        'question_id'=>1,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '2 answer here',
        'question_id'=>2,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '2 answer here 2',
        'question_id'=>2,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '2 answer here 3',
        'question_id'=>2,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '3 answer here',
        'question_id'=>3,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '3 answer here 2',
        'question_id'=>3,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '3 answer here 3',
        'question_id'=>3,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
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
