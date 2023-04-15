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
                        <label for="">Profile Image</label>
                        <input type="file" name="profile_image" accept="image/*" class="form-control form-control-lg" style="width: 300px;">
                        <small class="form-text text-muted">Image must be less than 2MB in size.</small>
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" id="" class="form-control" required>
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
                        <option value="Male" @if (old($user->gender) == "Male") {{ "selected" }} @endif>Male</option>
                        <option value="Female" @if (old($user->gender) == "Female") {{ "selected" }} @endif>Female</option>
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
