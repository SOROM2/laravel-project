<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend_User extends Model
{
    public $table = 'friends_users';
    public $timestamps = false;
    protected $fillable = ['friend_id','user_id'];

    //
  
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
