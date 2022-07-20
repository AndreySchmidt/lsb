<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        // $post = Post::find(2);
        // dd($post->tags);
        // $tag = Tag::find(1);
        // dd($tag->posts);
        
        // $postList = Post::where('is_published', true)->get();
        // return $postList;
        
        // $categoryList = Category::all();
        // dd($categoryList);

        // $category = Category::find(1);
        // $postList = Post::where('category_id', $category->id)->get();
        // dd($postList);

        // $category = Category::find(5);
        // $postList = $category->posts;

        // $postList = Post::find(10);
        // dd($postList->category);

        $postList = Post::all();
        return view('post.index', compact('postList'));
    }

    // public function show($postId)
    // {
    //     $post = Post::findOrFail(intval($postId));
    //     return view('post.show', compact('post'));
    // }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categoryList = Category::all();
        $tags = Tag::all();

        // dd($tags, compact('post', 'categoryList', 'tags'));
        return view('post.edit', compact('post', 'categoryList', 'tags'));
    }

    public function create()
    {
        // $postList = [
        //     ['title' => 'First This title', 'content' => 'here is a content', 'image' => 'src img', 'likes' => 20, 'is_published' => true],
        //     ['title' => 'Second Is title', 'content' => 'here 2 is a content', 'image' => 'src 2 img', 'likes' => 22, 'is_published' => true],
        //     ['title' => 'Third This title', 'content' => 'here is a content', 'image' => 'src img', 'likes' => 20, 'is_published' => true],
        //     ['title' => 'Fourth Is title', 'content' => 'here 2 is a content', 'image' => 'src 2 img', 'likes' => 22, 'is_published' => true],
        // ];

        // foreach($postList AS $postItem){
        //     Post::create($postItem);
        // }

        $categoryList = Category::all();
        $tagList = Tag::all();

        return view('post.create', compact('categoryList', 'tagList'));
    }
    public function store()
    {
        $postItem = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '',
        ]);

        if(isset($postItem['tags']))
        {
            $tags = $postItem['tags'];
            unset($postItem['tags']);
        }
        
        $post = Post::create($postItem);
        
        // dd($tags, $_POST);
        // foreach($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id
        //     ]);
        // }
        if(isset($tags))
        {
            $post->tags()->attach($tags);
        }
        
        return redirect()->route('post.index');

        // dd($postItem);
        // $postList = [
        //     ['title' => 'First This title', 'content' => 'here is a content', 'image' => 'src img', 'likes' => 20, 'is_published' => true],
        //     ['title' => 'Second Is title', 'content' => 'here 2 is a content', 'image' => 'src 2 img', 'likes' => 22, 'is_published' => true],
        //     ['title' => 'Third This title', 'content' => 'here is a content', 'image' => 'src img', 'likes' => 20, 'is_published' => true],
        //     ['title' => 'Fourth Is title', 'content' => 'here 2 is a content', 'image' => 'src 2 img', 'likes' => 22, 'is_published' => true],
        // ];

        // foreach($postList AS $postItem){
        //     Post::create($postItem);
        // }
        // return view('post.create');
    }


    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = [];
        if(isset($data['tags']))
        {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post->update($data);
        // fresh метод обновления массива из данных в БД
        // $post->fresh();
        // $post->tags()->attach($tags);

        if($tags)
        {
            // метод учитывает уже существующие записи связей с тегами в таблице (их нельзя дублировать)
            // удаляет не все привязки до этого (если их нет больше и не нужны) и добавляет связи из массива которых нет в таблице
            $post->tags()->sync($tags);
        }

        return redirect()->route('post.show', $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    // public function update()
    // {
    //     $postItem = Post::find(1);
    //     $postItem->update(['title' => 'new title']);
    // }

    // public function delete()
    // {
    //     $postItem = Post::find(1);
    //     $postItem->delete();
    // }
}
