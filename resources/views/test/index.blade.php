@extends('template')
@section('title')
    Olá
@stop
@section('content')
    <h1>Olá {!! $nome !!}<!-- injetado --></h1>
    <h1>Olá {{ $nome }}<!-- escapado --></h1>
@stop