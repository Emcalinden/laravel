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
        'question' => 'question1: A sequence is defined by the recurrence relation Un = 3Un-1- 2. If U0 = 2, what are the first five terms of the sequence?',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('question')->insert(array(
        'question' => 'question2: If in a recurrence relation Un+1 = 0.2Un + 4 and U0 = 6, then U3 equals what?',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
         DB::table('question')->insert(array(
        'question' => 'question3: If in a recurrence relation Un + 1 = 3Un - 2 and U0 = -5, then U3 equals what?',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
          DB::table('question')->insert(array(
        'question' => 'question4: A sequence is defined by the recurrence relation Un+1 = 3 - 2Un. If U1 = -2, calculate U2, U3 and U4.',
        'difficulty' => 'medium',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
           DB::table('question')->insert(array(
        'question' => 'question5: If a recurrence relation is defined by Un+2 = Un+1 + Un, and U1 = 1 and U2 = 1, the fifth term of the sequence would be?',
        'difficulty' => 'medium',
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
