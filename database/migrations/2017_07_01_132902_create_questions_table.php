<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_number');
            $table->integer('question_topic');
            $table->integer('question_difficulty');
            $table->integer('number_of_answer');
            $table->integer('correct_answer_number');
            $table->string('answer');
            $table->string('question_sound_path');
            $table->string('question_correct_answer_sound_path');
            $table->string('question_incorrect_answer_sound_path');
            $table->string('question_message_sound_path');
            $table->integer('max_version');
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
        Schema::drop('questions');
    }
}
