<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_answers', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('mcq_question_id')->unsigned()->index();
             $table->foreign('mcq_question_id')->references('id')->on('mcq_questions')->onDelete('CASCADE');
             $table->longText('option');
               $table->integer('user_id')->unsigned()->index();
             $table->integer('mcq_submission_id')->unsigned()->index();
             $table->foreign('mcq_submission_id')->references('id')->on('mcq_submissions')->onDelete('CASCADE');
             $table->timestamps();
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
