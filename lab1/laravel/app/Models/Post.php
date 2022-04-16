<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    private static $posts = [
        ['id' => 1, 'title' => 'Laravel', 'desc' => 'Made by Omar' , 'post_creator' => 'OmaRosh', 'created_at' => '2020-04-26 10:37:00'],
        ['id' => 2, 'title' => 'PHP', 'desc' => 'Made by Ahmed' ,'post_creator' => 'Mohamed', 'created_at' => '2021-11-16 10:37:00'],
        ['id' => 3, 'title' => 'Javascript','desc' => 'Made by Ali' , 'post_creator' => 'Ali', 'created_at' => '2013-02-06 10:37:00'],
    ];
    public static function getAllPosts(){
        return  self::$posts;
    }

    public static function findPost($id){
        $index=-1;
        // dd(self::$posts);
        foreach (self::$posts as $key =>$post) {
           if( $post['id'] == $id)
           $index = $key;
        }
        return self::$posts[$index];
    }
    public static function addPost($newPost){
        array_push(self::$posts , $newPost);
    }
}