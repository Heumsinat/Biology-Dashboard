<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'badges';

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
    protected $fillable = ['badge_number', 'badge_level', 'badge_short_name', 'badge_long_name', 'badge_level_name', 'badge_level_type', 'start_need_point', 'max_need_point', 'incorrect_answer_to_lose', 'badge_image', 'max_version'];

    
}
