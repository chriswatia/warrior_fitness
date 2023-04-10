@extends('user.user')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Profile
                <a href="{{ url('/') }}" class="btn btn-primary btn-sm float-end">Back
                </a>
            </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('profile/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="firstname" value="{{ $user->firstname }}" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="lastname" value="{{ $user->lastname }}" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="{{ $user->phone }}" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Gender</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" required="required" name="gender">                                    
                        {{-- <option>Choose Gender</option> --}}
                        <option value="Male" @if (old($user->gender) == "Male") {{ "selected" }} @endif>Male</option>
                        <option value="Female" @if (old($user->gender) == "Female") {{ "selected" }} @endif>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Address</label>
                        <textarea name="address" class="form-control">{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Role</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-lg example" disabled name="role_id">
                            <option selected></option>
                            @foreach ($roles as $role)
                            <option {{ old('role_id', $user->role_id) ==  $role->id ? 'selected' : ''}} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                            
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
