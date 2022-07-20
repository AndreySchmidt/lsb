<?php
namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($postItem)
    {
        if(isset($postItem['tags']))
        {
            $tags = $postItem['tags'];
            unset($postItem['tags']);
        }
        
        $post = Post::create($postItem);
        
        if(isset($tags))
        {
            $post->tags()->attach($tags);
        }
    }

    public function update($post, $data)
    {
        $tags = [];
        if(isset($data['tags']))
        {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post->update($data);
        $post->tags()->sync($tags);
    }
}



?>