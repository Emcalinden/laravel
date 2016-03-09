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
        'answer' => '6, 8, 12, 30, 84',
        'question_id'=>1,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '2, 4, 10, 28, 82',
        'question_id'=>1,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '1, 4, 10, 28, 82',
        'question_id'=>1,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '1.008',
        'question_id'=>2,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '5.008',
        'question_id'=>2,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '5.08',
        'question_id'=>2,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '-161',
        'question_id'=>3,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '-53',
        'question_id'=>3,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '53',
        'question_id'=>3,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => 'U2 = -7, U3 = 11, U4 = -25',
        'question_id'=>4,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => 'U2 = 7, U3 = -11, U4 = 25',
        'question_id'=>4,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => 'U2 = 7, U3 = 11, U4 = 25',
        'question_id'=>4,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '5',
        'question_id'=>5,
        'correct_answer'=> true,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '8',
        'question_id'=>5,
        'correct_answer'=> false,
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
      DB::table('answer')->insert(array(
        'answer' => '2',
        'question_id'=>5,
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
