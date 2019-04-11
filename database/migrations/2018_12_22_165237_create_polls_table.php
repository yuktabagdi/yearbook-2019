<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rollno')->unique();
            $table->string('q1')->default('');
            $table->string('q2')->default('');
            $table->string('q3')->default('');
            $table->string('q4')->default('');
            $table->string('q5')->default('');
            $table->string('q6')->default('');
            $table->string('q7')->default('');
            $table->string('q8')->default('');
            $table->string('q9')->default('');
            $table->string('q10')->default('');
            $table->string('q11')->default('');
            $table->string('q12')->default('');
            $table->string('q13')->default('');
            $table->string('q14')->default('');
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
        Schema::dropIfExists('polls');
    }
}
