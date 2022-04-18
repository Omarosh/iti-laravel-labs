@extends('layouts.app')

@section('title')Edit @endsection

@section('content') 
<?php 
//  echo $post[0];
?>
        <form method="POST" action="{{ route('post.update', $post[0]->id )}}">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter the post title" value="{{$post[0]->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" placeholder="Enter the post text" >{{$post[0]->desc}}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control" name="user_id">
        
                    <?php $count =0;?>
                    @foreach ($authors as $item)
                        <option value="{{$item[0]}}">{{$item[1]}}</option>
                    @endforeach

                    {{-- <option value="1">Ahmed</option>
                    <option value="2">Mohamed</option> --}}
                </select>
            </div>

          <button class="btn btn-success">Apply Edit</button>
        </form>
@endsection
    
