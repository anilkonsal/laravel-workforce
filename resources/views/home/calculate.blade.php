@extends('layouts.layout')
@section('content')

<h2>
@if(!empty($name)) 
    Hi {{$name}}, 
@endif
Your age is {{$age}}</h2>
@endsection