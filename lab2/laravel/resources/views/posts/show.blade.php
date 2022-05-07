@extends('layouts.app')
@section('title')
    Show post
@endsection

@section('content')
@if ($errors->any())
   <small  class="alert alert-info" role="alert">{{$errors->first()}}</small>
@endif
<div class="card mt-4 w-75">
    <div class="card-header">
      {{$post['title']}}
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p><span class="fs-5 fst-italic">description : </span>{{$post['desc']}}</p>
       <h4> <span class="fs-5 fst-italic">creator : </span>{{$post->user()->get()[0]->name}}</h4>
        <footer class="blockquote-footer">created At : <cite title="Source Title">{{Carbon\Carbon::createFromTimeString($post['created_at'])->toDayDateTimeString()}}</cite></footer>
      </blockquote>
    </div>
  </div>


  <div class="card mt-3 w-75">
    <div class="card-header bg-secondary text-light">
        Add acomment
    </div>
    <form action="{{ route('comments.store') }}" method="POST"
        class="row col-10 offset-1 my-2 d-flex justify-content-center">
        @csrf
        <div class="col-lg-9  col-sm-12">
            <input id="input-msg" class="form-control border border-success shadow-sm p-2 mb-1" type="text"
                onfocus="this.placeholder = ''" onblur="this.placeholder ='Enter  your comment'"
                placeholder='Enter your comment' aria-label="default input" autocomplete="off" name="body" />
        </div>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
        <input type="hidden" name="parent" value="App\Models\Post" />
        <button type="submit" id="send-btn" class="btn btn-success ms-2 col-lg-2 col-sm-8">
            <i class="fa-solid fa-paper-plane"></i>
            comment</button>
    </form>
</div>
@foreach ($post->comment as $comment)
    <div class="row w-75 mt-4 bg-primary p-1 text-dark bg-opacity-25">
        <div class="row col-12" style="min-height: 80px;">
            <div class="col-8">
                <p class="col-8 font-weight-normal m-1"> {{ $comment->body }}</p>
                <strong class="text-muted">written By: {{ $comment->commentable->user->name }}</strong>
            </div>
            <div class="row col-4">
                <span class=" offset-4 text-right font-italic">{{ $comment->created_at->diffForHumans() }}</span>

                <button class="btn btn-sm p-0 w-75 text-light rounded border border-success btn-warning col "
                    href="">EDIT</button>

                <form class="d-inline col p-0 " method="POST" style="margin-left: 2px">
                    <button class=" w-75  btn btn-danger border border-info ">DELETE</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

  @endsection