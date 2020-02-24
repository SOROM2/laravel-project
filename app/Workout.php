<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    //
    protected $fillable = ['date','type','minutes','kilometres','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
