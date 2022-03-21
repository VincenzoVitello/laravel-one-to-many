@extends('layouts.app')

@section('content')
    <h1>Titolo post: {{$post->title}}</h1>
    <p>Contenuto: {{$post->content}}</p>
    <a href="{{route('admin.posts.edit', $post->id)}}"><button>modifica</button></a>
@endsection