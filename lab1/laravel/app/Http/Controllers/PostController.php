<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
class PostController extends Controller
{

   

    public function index()
    {
      
        return view('posts.index',[
            'posts' => Post::getAllPosts(),
        ]);
    }


    public function create()
    {
        $authors = [];
        foreach (Post::getAllPosts() as $k) {
            array_push($authors, $k["post_creator"]);
        }
        return view('posts.create' , ['authors' => $authors]);
    }

 
    public function store(Request $request)
    {
        // dd($request->post_creator);
        // $mytime = Carbon::now();
        // $t = $mytime->toDateTimeString();
        
        $index =  count(Post::getAllPosts());
        $postToadd = [
            'id'=>$index+1,
            'title' =>$request->title,
            'post_creator'=>$request->post_creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'desc'=>$request->desc
        ];
         
        Post::addPost($postToadd);
        // dd(Post::getAllPosts());
        // return redirect()->route('post.show', ['post' => $index])->withErrors('message', 'post added successfully!');
        return redirect()->route('index');
    }

  
    public function show($id)
    {
        $post = Post::findPost($id);
        return view('posts.show',[
            'post' =>$post ,
        ]);
    }


    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
       
    }

   
    public function destroy($id)
    {
       
    }
 
}