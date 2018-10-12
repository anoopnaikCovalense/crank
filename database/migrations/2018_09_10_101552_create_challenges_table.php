<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->longText('cname');
            $table->longText('desc');
            $table->longText('statement');
            $table->longText('ipformat');
            $table->longText('constraints');
            $table->longText('opformat');
            $table->longText('testcaseipformat');
            $table->longText('testcaseopformat');
            $table->longText('tags');
            $table->integer('active')->default(1);
            $table->float('rating',3,1)->default(0.0);
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
        Schema::dropIfExists('challenges');
    }
}
