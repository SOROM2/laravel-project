<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    //
    protected $fillable = ['date','Kilograms','user_id'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('User');
    }
}
