@extends('layouts.main')
@section('content')
<div>
    <div>{{$post->id}}</div>
    <div><a href="{{ route('post.edit', $post->id) }}">{{$post->title}}</a></div>
    <div>{{$post->content}}</div>
    <div>{{$post->likes}}</div>
    <form action="{{ route('post.delete', $post->id) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
</div>
@endsection