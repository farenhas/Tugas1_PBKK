<?php 

namespace App\Models;

use Illuminate\Support\Arr;
class Post{
    public static function all(){
        return [
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
        ] ;
    }  
    
    public static function find($slug):array{
        return Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if(!$post){
            abort(404);
        }

        return $post;
    }
}