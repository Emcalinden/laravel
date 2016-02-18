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
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
        DB::table('question')->insert(array(
        'question' => 'question2',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
         DB::table('question')->insert(array(
        'question' => 'question3',
        'difficulty' => 'easy',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
          DB::table('question')->insert(array(
        'question' => 'question4',
        'difficulty' => 'medium',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
           DB::table('question')->insert(array(
        'question' => 'question5',
        'difficulty' => 'medium',
        'created_at' => date('Y-m-d H:m:s'),
        'updated_at' => date('Y-m-d H:m:s')
        ));
            DB::table('question')->insert(array(
        'question' => 'question6',
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
