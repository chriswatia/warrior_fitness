@extends('layouts.master')

@section('title', 'Report Crime')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Report Crime</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('add-crime') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Crime</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="category_id">
                            <option selected>Select crime</option>
                            @foreach (App\Models\CrimeCategory::all() as $crime_category)
                            <option value="{{ $crime_category->id }}">{{ $crime_category->category_name }}</option>
                            @endforeach                            
                        </select>
                    </div>                    
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Location</label>
                        <input type="text" name="crime_location" id="" class="form-control" required>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
