<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question_number', 'question_topic', 'question_difficulty', 'number_of_answer', 'correct_answer_number', 'answer', 'question_sound_path', 'question_correct_answer_sound_path', 'question_incorrect_answer_sound_path', 'question_message_sound_path', 'max_version'];

    
}
