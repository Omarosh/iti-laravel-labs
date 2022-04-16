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
       <h4> <span class="fs-5 fst-italic">creator : </span>{{$post['post_creator']}}</h4>
        <footer class="blockquote-footer">created At : <cite title="Source Title">{{Carbon\Carbon::createFromTimeString($post['created_at'])->toDayDateTimeString()}}</cite></footer>
      </blockquote>
    </div>
  </div>

  @endsection