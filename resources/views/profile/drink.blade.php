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
<h3 class="text-center"> My Drinks </h3>
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
                                @foreach($drinks as $drink)
                                <tr>
                                    <td class="table-success">{{$drink->date}}</td>
                                    <td class="table-success">{{$drink->level}}</td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    @endsection