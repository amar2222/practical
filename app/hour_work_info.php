<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hour_work_info extends Model
{
   
    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['work_day', 'work_hour', 'total_sub','sub_p_day' ,'total_h_w'];
}
