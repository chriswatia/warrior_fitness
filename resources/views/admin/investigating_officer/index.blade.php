@extends('layouts.master')

@section('title', 'Investigating Officers')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Investigating Officers
                    {{-- <a href="{{ url('admin/add-crime_category') }}" class="btn btn-primary btn-sm float-end">Add Investigating Officer
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
                            <th>Name</th>
                            <th>Specializtion</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($investigating_officers as $investigating_officer)
                            <tr>
                                <td>{{ $investigating_officer->firstname.' '.$investigating_officer->lastname }}</td>
                                <td>{{ $investigating_officer->category_name }}</td>
                                @php
                                    if($investigating_officer->status == 1){
                                        $status = 'Active';
                                    }
                                    else{
                                        $status = "Inactive";
                                    }
                                @endphp
                                <td>{{ $status }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('admin/edit-investigating_officer/' . $investigating_officer->u_id) }}">Update</a>
                                    {{-- <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-investigating_officer/' . $investigating_officer->u_id) }}">Delete</a> --}}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
