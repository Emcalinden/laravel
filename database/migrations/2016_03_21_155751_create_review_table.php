<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('review', function($table) {
    $table-> increments('review_id');
    $table->integer('user_id')->unsigned();
    $table-> string('review');
    $table->timestamps();
    });
     Schema::table('review', function($table) {
     $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
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
