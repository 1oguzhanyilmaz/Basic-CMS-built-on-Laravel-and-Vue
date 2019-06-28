@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="float-left">
                        <h4>List of Posts</h4>
                    </div>
                    <span>
						<a href="{{ route('posts.create') }}" type="button"
                           class="btn btn-sm btn-success float-right">New Post</a>
					</span>
                </div>
                <div class="card-body">
                    @if($posts->count() > 0)
                        <table class="table table-striped">
                            <thead>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    @if($post->image)
                                        <td>
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="Image" width="50px">
                                            {{--Post Imageee -> {{ 'storage/' . $post->image }}--}}
                                        </td>
                                    @else
                                        <td>No image</td>
                                    @endif
                                    <td>
                                        {{ str_limit($post->title, 30, '...') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit', $post->category->id) }}">
                                            {{ ucfirst($post->Category->name) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(!$post->trashed())
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        @else
                                            <form action="{{ route('restore-post', $post->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No Posts at this moment</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
