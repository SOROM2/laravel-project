<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Friend_User;


class FriendsController extends Controller
{
    public function getIndex()
  {
    $not_friends = User::where('id', '!=', Auth::user()->id);
    if (Auth::user()->friends->count()) {
      $not_friends->whereNotIn('id', Auth::user()->friends->modelKeys());
    }
    $not_friends = $not_friends->get();

    return view('friends.index')->with('not_friends', $not_friends);
  }

  public function getAddFriend($id)
{
  $friend = new Friend_User();
  $friendId = User::where('id', $id)->first();
  $friend->user_id = Auth::user()->id;
  $friend->friend_id = $friendId->id;
  $friend->save();
  
  return redirect('home')->with('success','Friend added successfully');
}

public function destroy($id)
{
  $friend = User::where('id', $id)->first();
  $friend->delete();
  return redirect('home')->with('success','Friend deleted successfully');
}

}
