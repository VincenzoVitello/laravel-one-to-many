@extends('layouts.app')

@section('content')
    
<form action="{{route('admin.posts.update', $post->id)}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea class="form-control" id="content" name="content" >{{$post->content}}</textarea>
    </div>
    <input type="submit" value="Confirm">
  </form>

@endsection