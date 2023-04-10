@extends('layouts.master')

@section('title', 'Crime Category List')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Crime Category List
                    <a href="{{ url('admin/add-crime_category') }}" class="btn btn-primary btn-sm float-end">Add Crime Category
                        </a>
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crime_categories as $crime)
                            <tr>
                                <td>{{ $crime->id }}</td>
                                <td>{{ $crime->category_code }}</td>
                                <td>{{ $crime->category_name }}</td>
                                <td>{{ $crime->description }}</td>
                                <td>{{ $crime->created_at->toDateString() }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-crime_category/' . $crime->id) }}">Edit</a> |
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-crime_category/' . $crime->id) }}">Delete</a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
