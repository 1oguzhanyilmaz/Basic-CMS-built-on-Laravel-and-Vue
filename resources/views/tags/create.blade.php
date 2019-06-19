@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
                </div>
                <div class="card-body">
                    @include('partials.error')

                    <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                        @csrf
                        @if(isset($tag))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ isset($tag) ? $tag->name : old('name') }}">
                            <button class="btn btn-success my-2">{{ isset($tag) ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection