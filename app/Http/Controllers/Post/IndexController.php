<?php

namespace App\Http\Controllers\Post;
// use App\Http\Controllers\Controller;
use App\Http\Requests\Post\IndexRequest;
use App\Models\Post;

use App\Http\Filters\PostFilter;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $postList = Post::filter($filter)->paginate(10); // это вызов метода из трейта scopeFilter

        // dd($data);

        return view('post.index', compact('postList'));
    }
    /**
    public function __invoke(IndexRequest $request)
    // public function __invoke() 30 урок не прилетает гет https://www.youtube.com/watch?v=cL1eXKsnRJI
    {
        //валидирование параметров гет запроса
        $data = $request->validated();
        // dd($data);

        $query = Post::query();
        if(isset($data['category_id'])) // если есть в гет айди категории
        {
            $query->where('category_id', $data['category_id']);
        }

        if(isset($data['title'])) // если есть в гет title
        {
            $query->where('title', 'like', "%{$data['title']}%");
        }

        if(isset($data['content']))
        {
            $query->where('content', 'like', "%{$data['content']}%");
        }
        
        $postList = $query->paginate(14);
        // $postList = $query->get();
        // dd($postList);

        // $postList = Post::all();

        // чтобы были ссылки пагинации в шаблоне бутстрап надо выполнить php artisan vendor:publish --tag=laravel-pagination
        // AppServiceProvider <- тут подключение шаблона пагинации
        // $postList = Post::paginate(10);



        // $postList = Post::where('category_id', 5)->paginate(10);

        return view('post.index', compact('postList'));
    
    }
    **/
}