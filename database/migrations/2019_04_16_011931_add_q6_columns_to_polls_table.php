<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQ6ColumnsToPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls', function (Blueprint $table) {
            //
            $table->string('q6')->default('');
            $table->string('q7')->default('');
            $table->string('q8')->default('');
            $table->string('q9')->default('');
            $table->string('q10')->default('');
            $table->string('q11')->default('');
            $table->string('q12')->default('');
            $table->string('q13')->default('');
            $table->string('q14')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polls', function (Blueprint $table) {
            //
        });
    }
}
