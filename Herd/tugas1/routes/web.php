<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Faren Haseena',
        'title' => 'About',
        'major' => 'Informatics Engineering',
        'major_id' => '5025221031'
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()]);
           
});

Route::get('/posts/{post:slug}', function (Post $post) {
   
    return view('post', ['title' => 'Single Post', 'post' => $post]);

});


Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) .' Articles by ' .$user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => ' Articles in Category ' .$category->name, 'posts' => $category->posts]);
});



Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
