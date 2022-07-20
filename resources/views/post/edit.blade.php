@extends('layouts.main')
@section('content')
<form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
        @foreach($tags as $key => $tag)
            <option 
                @foreach($post->tags as $postTag)
                {{ ($tag->id === $postTag->id)? 'selected' : '' }}
                @endforeach
            value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">category</label>
        <select class="form-select" name="category_id" id="category">
        @foreach($categoryList as $category)
        <option {{ ($category->id === $post->category_id)? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{$post->title}}" />
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{$post->image}}" />
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">content</label>
        <textarea class="form-control" name="content" id="content" rows="3">{{$post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-dark">Edit post</button>
</form>
@endsection