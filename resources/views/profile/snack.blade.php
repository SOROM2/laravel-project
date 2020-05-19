@extends('layouts.app')

@section('content')
<style>
table.table-bordered {
    border: 1px solid black;
    margin-top: 20px;
}

table.table-bordered>thead>tr>th {
    border: 1px solid black;
    text-align: center;
}

table.table-bordered>tbody>tr>td {
    border: 1px solid black;
    text-align: center;
}
</style>
<br>
<h3 class="text-center"> {{$user->name}}'s Snacks </h3>
<div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="mood">
                                    <th>Date</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($snacks as $snack)
                                <tr>
                                    <td class="table-success">{{$snack->date}}</td>
                                    <td class="table-success">{{$snack->level}}</td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @endsection