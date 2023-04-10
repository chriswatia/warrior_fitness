@extends('layouts.master')

@section('title', 'Update Investigating Officer')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Update Investigating Officer </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/edit-investigating_officer/' . $investigating_officer->u_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <input type="text" name="invo_id" value="{{ $investigating_officer->invo_id }}" id=""
                            class="form-control" hidden>
                        <input type="text" name="user_id" value="{{ $investigating_officer->u_id }}" id=""
                            class="form-control" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name"
                            value="{{ $investigating_officer->firstname . ' ' . $investigating_officer->lastname }}"
                            id="" class="form-control" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="">Specialization</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required"
                            name="category_id">
                            @foreach (App\Models\CrimeCategory::all() as $crime_category)
                                <option
                                    {{ old('category_id', $investigating_officer->category_id) == $crime_category->id ? 'selected' : 'Select Specialization' }}
                                    value="{{ $crime_category->id }}">{{ $crime_category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required"
                            name="status">
                            <option value="1" @if (old($investigating_officer->status) == '1') {{ 'selected' }} @endif>Active
                            </option>
                            <option value="0" @if (old($investigating_officer->status) == '0') {{ 'selected' }} @endif>Inactive
                            </option>
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
