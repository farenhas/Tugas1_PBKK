<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
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
        'posts' => [
            [
                'id' => '1',
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Faren Haseena',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium architecto nisi dignissimos enim rem ipsa iure officia veritatis! Dolor tenetur est ea iure deleniti officiis debitis ut et adipisci aperiam!'
            ],
            [
                'id' => '2',
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Faren Haseena',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia ut asperiores sapiente fuga blanditiis aliquid nam ab aspernatur? Libero rerum nihil voluptate, esse doloremque alias adipisci repellat recusandae odit quia!'
            ],
        ]
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => '1',
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Faren Haseena',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium architecto nisi dignissimos enim rem ipsa iure officia veritatis! Dolor tenetur est ea iure deleniti officiis debitis ut et adipisci aperiam!'
        ],
        [
            'id' => '2',
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Faren Haseena',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia ut asperiores sapiente fuga blanditiis aliquid nam ab aspernatur? Libero rerum nihil voluptate, esse doloremque alias adipisci repellat recusandae odit quia!'
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);

});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
