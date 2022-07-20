<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $postItem = $request->validated();
        $this->service->store($postItem);

        // if(isset($postItem['tags']))
        // {
        //     $tags = $postItem['tags'];
        //     unset($postItem['tags']);
        // }
        
        // $post = Post::create($postItem);
        
        // if(isset($tags))
        // {
        //     $post->tags()->attach($tags);
        // }
        
        return redirect()->route('post.index');
    }
}
