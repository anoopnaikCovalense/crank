<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mcq_question_id')->unsigned()->index();
            $table->foreign('mcq_question_id')->references('id')->on('mcq_questions')->onDelete('CASCADE');
             $table->longText('option');
             $table->integer('isAnswer')->default(0);
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
        Schema::dropIfExists('mcq_options');
    }
}
