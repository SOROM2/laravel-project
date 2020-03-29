@extends('layouts.app')

@section('content')

<div id="home" class="container tab-pane in active">

                        <form action="{{url()->action('[MoodController@update, $mood->id])}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
                                @if ($errors->has('date'))
                                        <span style="color:red;">
                                         {{ $errors->first('date') }}
                                        </span>
                                     @endif  
                            </div>
                            <div class="form-group">
                                <label for="level">Mood:</label>
                                <input type="text" class="form-control" id="level"
                                    placeholder="Enter mood level (1 - 10)" name="level">
                                    @if ($errors->has('level'))
                                        <span style="color:red;">
                                         {{ $errors->first('level') }}
                                        </span>
                                     @endif  
                            </div>
                          <button type="submit" name="mood" value="mood" class="btn btn-secondary">Submit</button>
                          <a href='/tables' class="btn btn-secondary"> Go Back</a>

                        </form>
                      


                    </div>

@endsection