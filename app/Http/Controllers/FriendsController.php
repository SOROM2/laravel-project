<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Friend_User;
use App\PendingRequests;

class FriendsController extends Controller
{
    /*
     * Get information for friends page
     */
    public function getIndex()
    {
        if(!Auth::user()) {
            return redirect('/');
        }

        $friend_id = User::whereIn('id', Friend_User::select('friend_id')->where('user_id', Auth::user()->id));
        $user_id = User::whereIn('id', Friend_User::select('user_id')->where('friend_id', Auth::user()->id));
        $friends = $friend_id->union($user_id)->get();


        $not_friends = User::where('id', '!=', Auth::user()->id);
      if (Auth::user()->friends->count()) {
      $not_friends->whereNotIn('id', Auth::user()->friends->modelKeys());
        }
        $not_friends = $not_friends->get();
  

        // NOT WORKING, JUST RETURNS FRIENDS //
        /*$not_friend_id = User::whereNotIn('id', Friend_User::select('friend_id')->where('friend_id', Auth::user()->id));
        $not_user_id = User::whereNotIn('id', Friend_User::select('user_id')->where('user_id', Auth::user()->id));
        $not_friends = $friend_id->union($user_id)->get();*/

        

        // get all recieved requests
        $recieved_requests = PendingRequests::where('reciever_id', Auth::user()->id)->get();

        // get all sent requests
        $sent_requests = PendingRequests::where('sender_id', Auth::user()->id)->get();

        return view('friends.index')
            ->with('not_friends', $not_friends)
            ->with('friends', $friends)
            ->with('recieved_requests', $recieved_requests)
            ->with('sent_requests', $sent_requests);
    }


    /*
     * Delete friendship with user $id
     */
    public function destroy($id)
    {
        $friend = Friend_User::where('friend_id', $id)->orWhere('user_id', $id)->first();

        if (!isset($friend)) {
            return redirect('/friends')->with('error',"You are not friends with that user");
        }

        // if the caller is not one of the users in the friend_user entry
        if ((Auth::user()->id !== $friend->user_id) && (Auth::user()->id !== $friend->friend_id)) {
            return redirect('/friends')->with('error',"You cannot delete someone else's friends.");
        }

        $friend->delete();

        return redirect('/friends')->with('success','Friend deleted successfully.');
    }

    /*
     * Create a request with user $id
     */
    public function createRequest($id)
    {
        if(Auth::user()->id === $id)
        {
            return redirect('/friends')->with('error',"You can't add yourself as a friend");
        }

        $existing_sent_request = PendingRequests::where('reciever_id', $id)->where('sender_id', Auth::user()->id)->first();
        $existing_recieved_request = PendingRequests::where('sender_id', $id)->where('reciever_id', Auth::user()->id)->first();

        $existing_friend_id = Friend_User::where('friend_id', $id)->where('user_id', Auth::user()->id)->first();
        $existing_user_id = Friend_User::where('user_id', $id)->where('friend_id', Auth::user()->id)->first();

        if ($existing_sent_request) {
            return redirect('/friends')->with('error','You have already sent this user a request.');
        }

        if ($existing_recieved_request) {
            return redirect('/friends')->with('error','This user has already sent you a request.');
        }

        if ($existing_friend_id) {
            return redirect('/friends')->with('error','You are already friends with this user.');
        }

        if ($existing_user_id) {
            return redirect('/friends')->with('error','You are already friends with this user.');
        }

        $pending_request = new PendingRequests();
        $pending_request->sender_id = Auth::user()->id;
        $pending_request->reciever_id = $id;
        $pending_request->save();

        return redirect('/friends')->with('success','Friend request sent.');
    }

    /*
     * Accept request $id
     */
    public function acceptRequest($id)
    {
        $pending_request = PendingRequests::where('id', $id)->first();

        if (!isset($pending_request)) {
            return redirect('/friends')->with('error', 'That request does not exist.');
        }

        // check if the caller is the request reciever
        if (Auth::user()->id !== $pending_request->reciever_id) {
            return redirect('/friends')->with('error', 'You cannot accept this request.');
        }

        // add entry to friends table
        $friend = new Friend_User();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $pending_request->sender_id;
        $friend->save();

        // delete entry from pending requests table
        $pending_request->delete();

        return redirect('/friends')->with('success', 'friend successfully added.');
    }

    /*
     * Decline request $id
     */
    public function declineRequest($id)
    {
        $pending_request = PendingRequests::where('id', $id)->first();

        if (!isset($pending_request)) {
            return redirect('/friends')->with('error', 'That request does not exist.');
        }

        // check if the caller has permission to delete the request
        if ((Auth::user()->id !== $pending_request->reciever_id) && (Auth::user()->id !== $pending_request->sender_id)) {
            return redirect('/friends')->with('error', 'You cannot delete this request');
        }

        $pending_request->delete();

        return redirect('/friends')->with('success', 'Request removed.');
    }

}
