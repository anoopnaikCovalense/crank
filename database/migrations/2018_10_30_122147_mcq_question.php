<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mcq_id')->unsigned()->index();
            $table->foreign('mcq_id')->references('id')->on('mcqs')->onDelete('CASCADE');
             $table->longText('question');
             $table->integer('active')->default(1);
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
        Schema::dropIfExists('mcq_questions');
    }
}
