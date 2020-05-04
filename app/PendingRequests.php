<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingRequests extends Model
{
    protected $fillable = ['sender_id','receiver_id'];
    public $timestamps = false;

    
}
