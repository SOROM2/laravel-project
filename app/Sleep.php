<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    //
    protected $fillable = ['date','hours','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
