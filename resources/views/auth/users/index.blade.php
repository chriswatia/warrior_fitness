@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Users
                    {{-- <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm float-end">Add User
                        </a> --}}
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_list as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->address }}</td>
                                @php
                                    $role = App\Models\Role::where('id', $user->role_id)->first();
                                    if(blank($role)){

                                        $role = "";
                                    }
                                    else{
                                        $role = $role->name;
                                    }
                                @endphp
                                <td>{{ $role }}</td>
                                <td>{{ $user->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-user/' . $user->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-user/' . $user->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
