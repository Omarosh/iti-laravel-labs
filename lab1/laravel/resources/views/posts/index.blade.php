@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('post.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post)        
              <tr>
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['post_creator'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                   
                    <x-mybutton type="primary" href="{{ route('post.show', ['post' => $post['id']]) }}" text="View"/>
                    <x-mybutton type="secondary" href='#' text="edit"/>
                    <x-mybutton type="danger" href='#' text="Delete"/>

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
@endsection
 