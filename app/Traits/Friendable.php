<?php

namespace App\Traits;
use App\Requests;
use App\Friend_user;
trait Friendable

{
    public function test()
    {
        return 'hi';
    }

    public function addFriend($id){

        $request = Request::created([
            
            'requester' => $this->id,
            'user_requested' => $user_id,
        ]);
        if($request)
        {
            return $request;
        }
        return 'failed';

    }
}
