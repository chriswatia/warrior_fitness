@extends('user.user')

@section('title', 'Reported Crimes')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Reported Crimes
                    <a href="{{ url('/add-crime') }}" class="btn btn-primary btn-sm float-end">Report Crime
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
                            <th>Crime</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Investigating Officer</th>
                            <th>Date Reported</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crimes as $crime)
                            <tr>
                                <td>{{ $crime->id }}</td>
                                <td>{{ App\Models\CrimeCategory::where('id', $crime->category_id)->first()->category_name }}</td>
                                <td>{{ $crime->description }}</td>  
                                <td>{{ $crime->crime_location }}</td>           
                                <td>{{ $crime->status }}</td>     
                                @php
                                    $officer = App\Models\Crime::leftJoin('crime_assignment as ca','crimes.id', 'ca.crime_id')
                                    ->leftJoin('users as u', 'ca.officer_id', 'u.id')
                                    ->where('crimes.id', $crime->id)->first();
                                @endphp
                                <th>{{ $officer->firstname.' '.$officer->lastname }}</th>                     
                                <td>{{ $crime->created_at->toDateString() }}</td>
                                <td>
                                    @if ($crime->file)
                                    <a href="{{ asset('uploads/' . $crime->file) }}" target="_blank" rel="noopener noreferrer">View</a>
                                    @endif
                                </td>  
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('crime_status/' . $crime->id) }}">View Progress</a>
                                    {{-- <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-crime_category/' . $crime->id) }}">Delete</a> --}}

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
