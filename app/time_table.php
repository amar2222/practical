<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class time_table extends Model
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
    protected $fillable = ['week_id', 'subject', 'hour'];

    public function sub()
    {
        return $this->belongsTo(hour_work_info::class);
    }
}
