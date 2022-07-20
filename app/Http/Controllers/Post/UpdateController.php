<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        // $tags = [];
        // if(isset($data['tags']))
        // {
        //     $tags = $data['tags'];
        //     unset($data['tags']);
        // }

        // $post->update($data);
        // $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }
}
