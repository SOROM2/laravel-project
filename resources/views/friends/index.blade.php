@extends('layouts.app')

@section('content')

  <h2 class="subheader">Friends</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach(Auth::user()->friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td><a href="/profile/{{ $friend->username }}">Profile</a></td>
          <td>{{$friend->id}}</td>
          
          <td>   <form action="{{action('FriendsController@destroy', $friend->id)}}" method="post">
                                        {{csrf_field()}}
                                         <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h2 class="subheader">Other People</h2>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($not_friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td><a href="/profile/{{ $friend->username }}">Profile</a></td>
          <td>{{$friend->id}}</td>
          <td>
          <form action="{{action('FriendsController@getAddFriend',$friend->id)}}" method="POST">
          @csrf
                                                                              
                                        <button class="btn btn-danger" type="submit">Add Friend</button>
                                        </form>
            </td>
            <td><a href= "{{url('/friends')}}/addFriend/{{$friend->id}}" class="btn btn-danger">Add Friend</td>
   
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection