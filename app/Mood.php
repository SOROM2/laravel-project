<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    //
    protected $fillable = ['date','level','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
