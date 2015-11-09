@extends('app')
@section('content')
    @if ($first == 'gumba')
        <h1>escaped About Me: {{$name}}</h1>
        <h2>not escaped About Me: {!! $name!!}</h2>
        <h3>{{$first}} {{$last}}</h3>

    @else
        <h1>{{$cool}} {{$Guy}}</h1>
    @endif

    @if(count($people))
        @foreach($people as $char)
            <h2>My People</h2>
            <ul>
                <li>{{$char}}</li>
            </ul>

        @endforeach
    @endif
@stop