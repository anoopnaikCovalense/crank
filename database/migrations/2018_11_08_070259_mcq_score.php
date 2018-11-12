<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mcq_id')->unsigned()->index();
            $table->foreign('mcq_id')->references('id')->on('mcqs')->onDelete('CASCADE');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('mcq_submission_id')->unsigned()->index();
            $table->foreign('mcq_submission_id')->references('id')->on('mcq_submissions')->onDelete('CASCADE');
            $table->integer('score');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
