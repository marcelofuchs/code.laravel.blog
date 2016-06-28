@extends('template')
@section('title')
    Notas
@stop
@section('content')
<h1>Notas</h1>
<ol>
    @foreach($notas as $nota)
        <li>{{$nota}}</li>
    @endforeach
</ol>
@stop