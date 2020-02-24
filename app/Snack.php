<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    //
    protected $fillable = ['date','type','kilojoules','calories','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
