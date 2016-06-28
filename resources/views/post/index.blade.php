@extends('template')
@section('title')
    Post
@stop
@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }} {{$post->created_at}}</h2>
        <p>{{$post->content}}</p>
        <h3>Comentários</h3>
        <b>Tags:</b>
        <ul>
        @foreach($post->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
        </ul>

        @foreach($post->comments as $comment)
            <b>Nome: </b>{{$comment->name}}<br>
            <b>Comentário: </b>{{$comment->comment}}
        @endforeach
        <hr>
    @endforeach
@stop