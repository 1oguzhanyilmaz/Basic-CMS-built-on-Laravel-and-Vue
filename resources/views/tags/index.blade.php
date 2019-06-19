@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="float-left">
                        <h4>List of Tags</h4>
                    </div>
                    <span>
					<a href="{{ route('tags.create') }}" type="button" class="btn btn-success float-right">
	                    New Tags
	                </a>
				</span>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($tags->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                <th>Name</th>
                                <th>Tags count</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            {{ $tag->posts->count() }}
                                        </td>
                                        <td>
                                            <form action="" method="">
                                                {{--@method('DELETE')--}}
                                                @csrf
                                                <a href="{{ url('/admin/tags/'.$tag->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h3 class="text-center">No Tags at this moment yet</h3>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="daleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteTagForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="daleteModalLabel">Delete <span id="tagName">Tags</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this tag?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteTagForm')
            form.action = '/admin/tags/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection