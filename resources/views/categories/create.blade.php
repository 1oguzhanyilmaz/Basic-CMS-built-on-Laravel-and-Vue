@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ isset($category) ? 'Edit Category' : 'Create Category' }}
                </div>
                <div class="card-body">
                    @include('partials.error')
                    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ isset($category) ? $category->name : old('name') }}">
                            <button class="btn btn-success my-2">{{ isset($category) ? 'Update' : 'Create' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection