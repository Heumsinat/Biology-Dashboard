<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';

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
    protected $fillable = ['level_number', 'level_name', 'level_short_name', 'level_need_point', 'level_image', 'max_version'];

    
}
