<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    //
    protected $fillable = ['date','number','type','kilojoules','calories','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
