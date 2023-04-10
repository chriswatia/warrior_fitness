@extends('layouts.master')

@section('title', 'Crime Evidence')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Crime Evidence</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/crime-close/' . $crime->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Crime</label>
                            <input type="text" readonly name="category_id"
                                value="{{ App\Models\CrimeCategory::where('id', $crime->category_id)->first()->category_name }}"
                                id="" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Location</label>
                            <input type="text" name="crime_location" value="{{ $crime->crime_location }}" readonly
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Mac Address</label>
                            <input type="text" name="mac_address" value="{{ $crime->mac_address }}" readonly
                                class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Device</label>
                            <textarea name="device_type" readonly class="form-control">{{ $crime->device_type }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="" readonly class="form-control">{{ $crime->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Comments</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <input type="text" name="crime_id" value="{{ $crime->id }}" hidden>
                    <div class="row">
                        <button type="submit" class="btn btn-danger">Close Crime</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
