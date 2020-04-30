<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    public function workouts()
    {
        return $this->hasMany('App\Workout');
    }
    public function sleeps()
    {
        return $this->hasMany('App\Sleep');
    }
    public function moods()
    {
        return $this->hasMany('App\Mood');
    }
    public function snacks()
    {
        return $this->hasMany('App\Snack');
    }
    public function drinks()
    {
        return $this->hasMany('App\Drink');
    }
    public function weights()
    {
        return $this->hasMany('App\Weight');
    }



    public function friends()
	{
		return $this->belongsToMany(User::class, 'friends_users', 'user_id', 'friend_id');
    }

    
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'weightStarting', 'height', 'gender', 'biography'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
