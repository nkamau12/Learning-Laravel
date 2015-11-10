@extends('app')

@section('content')
    <h1>{{$articles->title}}</h1>
    {{$articles->body}}
@stop