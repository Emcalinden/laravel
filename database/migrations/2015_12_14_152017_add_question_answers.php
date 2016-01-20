<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

      DB::table('question_answer')->insert(array(
        'question_id' => 1,
        'answer_id' => 1,
        ));
     DB::table('question_answer')->insert(array(
        'question_id' => 2,
        'answer_id' => 2,
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
