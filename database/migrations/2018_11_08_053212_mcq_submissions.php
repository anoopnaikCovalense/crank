<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mcq_id')->unsigned()->index();
            $table->foreign('mcq_id')->references('id')->on('mcqs')->onDelete('CASCADE');
            $table->integer('user_id')->unsigned()->index();
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
