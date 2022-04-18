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
                <td>{{ $post->user()->get()[0]->name }}</td>
                {{-- <td>{{  (new Carbon($post["created_at"]))->isoFormat('Y - M - D') }}</td> --}}
                <td>{{ $post['created_at2'] }}</td>
                <td>
                   
                    <x-mybutton type="primary" href="{{ route('post.show', ['post' => $post['id']]) }}"> View </x-mybutton>
                    <x-mybutton type="secondary" href="{{route('post.edit', ['post'=>$post])}}"> Edit </x-mybutton>
                    {{-- <x-mybutton type="danger" href="{{route('posts.delete', ['post'=>$post])}}"> Delete </x-mybutton> --}}

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
@endsection
 