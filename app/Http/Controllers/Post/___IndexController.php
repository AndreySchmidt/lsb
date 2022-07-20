<?php

namespace App\Http\Controllers\Post;
// use App\Http\Controllers\Controller;
use App\Http\Requests\Post\IndexRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    // public function __invoke() 30 урок не прилетает гет https://www.youtube.com/watch?v=cL1eXKsnRJI
    {
        //валидирование параметров гет запроса
        $data = $request->validated();
        $query = Post::query();

        if(isset($data['category_id'])) // если есть в гет айди категории
        {
            $query->where('category_id', $data['category_id']);
        }

        if(isset($data['title'])) // если есть в гет title
        {
            $query->where('title', 'like', "%{$data['title']}%");
        }

        $postList = $query->get();
        dd($postList, $data);

        // $postList = Post::all();

        // чтобы были ссылки пагинации в шаблоне бутстрап надо выполнить php artisan vendor:publish --tag=laravel-pagination
        // AppServiceProvider <- тут подключение шаблона пагинации
        // $postList = Post::paginate(10);

        return view('post.index', compact('postList'));
    }
}