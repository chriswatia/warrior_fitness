@extends('user.user')

@section('title', 'Crime Status')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Crime Details</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Crime</label>
                        <input type="text" readonly name="category_id" value="{{ App\Models\CrimeCategory::where('id', $crime->category_id)->first()->category_name}}" id="" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Location</label>
                        <input type="text" name="crime_location" value="{{ $crime->crime_location }}" readonly class="form-control" required>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" readonly class="form-control">{{ $crime->description }}</textarea>
                    </div>                    
                </form>
                <div class="card-header">
                    <h4 class="">Crime Progress
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
                                <th>Update Status</th>
                                <th>Last Updated</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\CrimeProgress::where('crime_id', $crime->id)->get() as $crime_progress)
                                <tr>
                                    <td>{{ $crime_progress->id }}</td>
                                    <td>{{ $crime_progress->description }}</td>                                
                                    <td>{{ $crime_progress->updated_at->toDateString() }}</td>  
                                    <td>
                                        @if ($crime_progress->file)
                                        <a href="{{ asset('uploads/' . $crime_progress->file) }}" target="_blank" rel="noopener noreferrer">View File</a>
                                        @endif
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
