@extends('layouts.app')

@section('title')Index @endsection

@section('content')

@if (session('delete'))
<div class="alert alert-info">
    {{ session('delete') }}
</div>
@endif
@if (session('restore'))
<div class="alert alert-success">
    {{ session('restore') }}
</div>
@endif

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
              <?php $count =0; ?>
            @foreach ( $posts as $post)        
            <tr @if ($post->trashed()) class="table-danger" @endif>
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post->user()->get()[0]->name }}</td>
                {{-- <td>{{  (new Carbon($post["created_at"]))->isoFormat('Y - M - D') }}</td> --}}
                <td>{{ $post['created_at2'] }}</td>
                <td>
                   
                    
                                        <!-- Button trigger modal -->
                    
                    @if ($post->trashed())
                            <form action="{{ route('post.restore', ['post' => $post->id]) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="col-8  btn btn-success">restore</button>
                            </form>
                        @else
                          <x-mybutton type="primary" href="{{ route('post.show', ['post' => $post['id']]) }}"> View </x-mybutton>
                          <x-mybutton type="secondary" href="{{route('post.edit', ['post'=>$post])}}"> Edit </x-mybutton>
                          {{-- <x-mybutton type="danger" href="{{route('post.delete', ['post'=>$post])}}"> Delete </x-mybutton> --}}
    
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">
                              Delete
                            </button>
                        @endif




                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete?
                      
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('post.delete', ['post'=>$post])}}" method="POST"
                              class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>

                </td>
              </tr>
              <?php $count++; ?>
              @endforeach

            </tbody>
          </table>
          <div class="">
            {{ $posts->links() }}
        </div>
@endsection
 