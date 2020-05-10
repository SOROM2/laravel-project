@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block col-xl-6 col-md-6 col-sm-10 mx-auto">
        <button type="button" class="close" data-dismiss="alert">close</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block col-xl-6 col-md-6 col-sm-10 mx-auto">
        <button type="button" class="close" data-dismiss="alert">close</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="text-center col-xl-8 col-md-8 col-sm-14 mx-auto">

  <h2 class="subheader">Friends</h2>
@if (empty($friends))
<p>You have no friends.</p>
@else
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td><a href="/profile/{{ $friend->username }}" class="btn btn-primary">Profile</a></td>
          <td><a href="/friends/delete/{{$friend->id}}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif

<br>

<h2 class="subheader">Pending requests</h2>
@if (empty($recieved_requests))
<p>You have not recieved any requests.</p>
@else
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Accept/Decline</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($recieved_requests as $request)
      <tr>
        @foreach ($not_friends as $u)
            @if($u->id == $request->sender_id)
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td><a href="/profile/{{ $u->username }}" class="btn btn-primary">Profile</a></td>
                @break
            @endif
        @endforeach
          <td><a href="/friends/accept/{{$request->id}}" class="btn btn-primary">Accept</a>
          <a href="/friends/decline/{{$request->id}}" class="btn btn-danger">Decline</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif

<br>

<h2 class="subheader">Sent requests</h2>
@if (is_null($sent_requests))
<p>You have not sent any requests.</p>
@else
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Cancel</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sent_requests as $request)
      <tr>
        @foreach ($not_friends as $u)
            @if($u->id == $request->reciever_id)
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td><a href="/profile/{{ $u->username }}" class="btn btn-primary">Profile</a></td>
                @break
            @endif
        @endforeach
          <td><a href="/friends/cancel/{{$request->id}}" class="btn btn-danger">Cancel</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif

<br>

  <h2 class="subheader">Other People</h2>
@if (!isset($not_friends))
 <p>Everyone is your friend.</p>
@else
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Add friend</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($not_friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td><a href="/profile/{{ $friend->username }}" class="btn btn-primary">Profile</a></td>
          <td><a href="/friends/add/{{ $friend->id }}" class="btn btn-primary">Add friend</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endif
</div>

@endsection
