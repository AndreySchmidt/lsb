@extends('layouts.main')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">likes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postList AS $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td><a href="{{ route('post.show', $post->id) }}">{{$post->title}}</a></td>
                <td>{{$post->content}}</td>
                <td>{{$post->likes}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="m-3">{{ $postList->withQueryString()->links() }}</div>
    <a href="{{ route('post.create') }}">Add new post</a>
@endsection