<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $categoryList = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categoryList', 'tags'));
    }
}
