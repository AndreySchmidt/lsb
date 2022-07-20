@extends('layouts.main')
@section('content')
<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
        @foreach($tagList as $tag)
        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">category</label>
        <select class="form-select" name="category_id" id="category">
        @foreach($categoryList as $category)
        <option {{ ( old('category_id') == $category->id )? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="title">
    </div>
    @error('title')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="text" class="form-control" name="image" value="{{ old('image') }}" id="image" placeholder="image">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">content</label>
        <textarea class="form-control" name="content" id="content" rows="3"> {{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-dark">Add post</button>
</form>
@endsection