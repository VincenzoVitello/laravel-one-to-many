@extends('layouts.app')
@section('content')

@auth
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
        <strong>You are logged in!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endauth
@foreach($posts as $element)
    <div class="posts_container">
        <h1>{{$element->title}}</h1>
        <p>{{$element->content}}</p>
        <a href="{{route('admin.posts.show', $element->id)}}"><button>mostra post</button></a>
        <form action="{{route("admin.posts.destroy", $element->id)}}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="" onclick="return confirm('Sei sicuro di voler eliminare questo post?');">Elimina</button>
        </form>
    </div>
@endforeach
<br>
<a href="{{route('admin.posts.create')}}"><button>crea nuovo post</button></a>

@endsection