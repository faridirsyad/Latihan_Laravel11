<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {

    return view('posts', ['title' => 'Blog', 'posts' => 
    Post::search(request(['search', 'author', 'category']))->latest()->paginate(6)->withQueryString()]);

    //eager loading = menyelesaikan n+1
    // $posts = Post::with(['author', 'category'])->latest()->get();

    // $posts = Post::latest();

    // if(request('search')){
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }
});

Route::get('/posts/{post:slug}', function(Post $post){
    
    // $post = Post::find($slug);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user){
    //lazy eager loading
    // $posts = $user->posts->load('category', 'author');
    
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    //lazy eager loading
    // $posts = $category->posts->load('category', 'author');
    
    return view('posts', ['title' => 'Articles in : ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

