@extends('layouts.master')

@section('title', 'Crime Reporters')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Crime Reporters
                    {{-- <a href="{{ url('/admin/add-crime') }}" class="btn btn-primary btn-sm float-end">Report Crime
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
                            <th>Crimes Reported</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crimes as $crime)
                            <tr>
                                <td>{{ $crime->firstname.' '.$crime->lastname }}</td>
                                <td>{{ $crime->crimes_reported }}</td>
                                <td>{{ $crime->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
