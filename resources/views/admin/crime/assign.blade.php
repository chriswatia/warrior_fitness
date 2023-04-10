@extends('layouts.master')

@section('title', 'Crime Assigment')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Crime Assigment</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/crime-assigment/'.$crime->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Crime</label>
                        <input type="text" readonly name="category_name" value="{{ App\Models\CrimeCategory::where('id', $crime->category_id)->first()->category_name}}" id="" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Location</label>
                        <input type="text" name="crime_location" value="{{ $crime->crime_location }}" readonly class="form-control" required>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Mac Address</label>
                            <input type="text" name="mac_address" value="{{ $crime->mac_address }}" readonly class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Device</label>
                            <textarea name="device_type" readonly class="form-control">{{ $crime->device_type }}</textarea>
                        </div> 
                        </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" readonly class="form-control">{{ $crime->description }}</textarea>
                    </div>   
                    <input type="text" name="crime_id" value="{{ $crime->id }}" hidden> 
                    <input type="text" name="category_id" value="{{ $crime->category_id }}" hidden> 
                    <div class="mb-3">
                        <label for="">Investigating Officer</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="officer_id">
                            <option selected>Select Investigating Officer</option>
                            @foreach (App\Models\InvestigatingOfficer::join('users as u','investigating_officers.user_id', 'u.id')->where('u.role_id', 3)->where('investigating_officers.status', 1)->get() as $InvestigatingOfficer)
                            <option value="{{ $InvestigatingOfficer->id }}">{{ $InvestigatingOfficer->firstname.' '.$InvestigatingOfficer->lastname }}</option>
                            @endforeach                            
                        </select>
                    </div>   
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>              
                </form>
            </div>
        </div>
    </div>
@endsection
