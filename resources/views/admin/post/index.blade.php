@extends('template')
@section('title')
    Post
@stop
@section('content')
    <h1>Blog Admin</h1>
    <a href="{{route('admin.post.create')}}" class="btn btn-primary">Novo Post</a>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Ação</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>
                <a href="{{route('admin.post.edit',['id'=>$post->id])}}" class="btn btn-default">Editar</a>
                <a href="{{route('admin.post.destroy',['id'=>$post->id])}}" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!!$posts->render()!!}
@stop