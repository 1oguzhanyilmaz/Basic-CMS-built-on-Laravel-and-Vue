@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="float-left">
                        <h4>Users</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if($users->count() > 0)
                        <table class="table table-striped table-sm">
                            <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{--<img width="40px" style="border-radius:50%;" src="{{ Gravatar::src($user->email) }}"--}}
                                             {{--alt="profile-image">--}}
                                        Gravatar image
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @if(!$user->isAdmin())
                                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success btn-sm">Make Admin</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center">No Users Yet</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
