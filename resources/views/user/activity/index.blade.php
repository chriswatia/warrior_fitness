@extends('user.user')

@section('title', 'Activity Log')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Activity Log
                    <a href="{{ url('/add-activity') }}" class="btn btn-primary btn-sm float-end">Add Activity
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
                            <th>Title</th>
                            <th>Type</th>
                            <th>Steps</th>
                            <th>Points</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Distance</th>
                            <th>Calories</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->title }}</td>
                                <td>{{ $activity->type }}</td>
                                <td>{{ $activity->steps }}</td>
                                <td>{{ $activity->points }}</td>
                                <td>{{ $activity->activity_date }}</td>
                                <td>{{ $activity->starttime }}</td>
                                <td>{{ $activity->endtime }}</td>
                                <td>{{ $activity->distance .'km' }}</td>
                                <td>{{ $activity->energy }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ url('edit-activity/' . $activity->id) }}">Edit</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
