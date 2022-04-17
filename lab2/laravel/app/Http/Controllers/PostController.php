<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
class PostController extends Controller
{

   

    public function index()
    {
        //select * from posts where title = 'CSS';
        // $filteredPosts = Post::where('title', 'CSS')->get();
        // dd($filteredPosts);

        $posts = Post::all(); //select * from posts;
        //  dd($posts[0]->desc);
        //  $posts[0]->user()->get()[0]->name
        foreach ($posts as $k) {
            $date = new Carbon($k["created_at"]);
            $k["created_at2"] = $date->isoFormat('Y - M - D');
        }
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }


    public function create()
    {
        $users = User::all();
        $authors = [];
        foreach (User::all() as $k) {
            array_push($authors, [$k["id"] , $k["name"]] );
        }
        return view('posts.create' , ['users' => $users,'authors' => $authors]);
    }

 
    public function store(Request $request)
    {
        $postToadd = [
            'title' =>$request->title,
            'user_id'=>$request->user_id,
            'desc'=>$request->desc
        ];
        //  dd($postToadd);
        //store the request data into the db
        Post::create($postToadd);
        // Post::addPost($postToadd);
        // dd(Post::getAllPosts());
        // return redirect()->route('post.show', ['post' => $index])->withErrors('message', 'post added successfully!');
        return redirect()->route('index');
    }

  
    public function show($postId)
    {
        $post = Post::find($postId);
        dd($post);
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