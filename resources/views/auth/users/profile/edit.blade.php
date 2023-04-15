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
                <form action="{{ url('profile/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mt-1">
                                <div class="card-header">
                                    <h6>Personal Info</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" value="{{ $user->email }}"
                                                    id="" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="number" name="phone" value="{{ $user->phone }}"
                                                    id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <select class="form-select form-select-sm"
                                                    aria-label=".form-select-lg example" required="required" name="gender">
                                                    <option value="Male"
                                                        @if (old($user->gender) == 'Male') {{ 'selected' }} @endif>Male
                                                    </option>
                                                    <option value="Female"
                                                        @if (old($user->gender) == 'Female') {{ 'selected' }} @endif>
                                                        Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" value="{{ $user->address }}" id="" class="form-control">{{ $user->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mt-1">
                                <div class="card-header">
                                    <h6>About You</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Weight(Kg)</label>
                                                <input type="text" name="weight" value="{{ $user->weight }}"
                                                    id="" class="form-control" placeholder="Weight in kilograms"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Height(Cm)</label>
                                                <input type="text" name="height" value="{{ $user->height }}"
                                                    id="" class="form-control" placeholder="Height in Centimetres"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="date_of_birth">Date of Birth:</label>
                                                <input type="date" name="date_of_birth"
                                                    value="{{ $user->date_of_birth }}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card mt-1">
                                <div class="card-header">
                                    <h6>Activity Goals</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Daily Steps</label>
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-outline-primary input-group-text"
                                                        onclick="decrementTarget()">-</button>
                                                    <select class="form-select form-select-sm"
                                                        aria-label=".form-select-lg example" name="target">
                                                        @for ($i = 500; $i <= 90000; $i += 500)
                                                            <option value="{{ $i }}"
                                                                @if ($user->target == $i) {{ 'selected' }} @endif>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <button type="button"
                                                        class="btn btn-outline-primary input-group-text"
                                                        onclick="incrementTarget()">+</button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Heart Points</label>
                                                <div class="input-group">
                                                    <button type="button"
                                                        class="btn btn-outline-primary input-group-text"
                                                        onclick="decrementPoints()">-</button>
                                                    <select class="form-select form-select-sm"
                                                        aria-label=".form-select-lg example" name="points">
                                                        @for ($i = 5; $i <= 200; $i += 5)
                                                            <option value="{{ $i }}"
                                                                @if ($user->points == $i) {{ 'selected' }} @endif>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <button type="button"
                                                        class="btn btn-outline-primary input-group-text"
                                                        onclick="incrementPoints()">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function incrementTarget() {
        var select = document.getElementsByName('target')[0];
        var currentValue = parseInt(select.value);
        var maxValue = parseInt(select.options[select.options.length - 1].value);
        if (currentValue + 500 <= maxValue) {
            select.value = (currentValue + 500).toString();
        }
    }

    function decrementTarget() {
        var select = document.getElementsByName('target')[0];
        var currentValue = parseInt(select.value);
        var minValue = parseInt(select.options[0].value);
        if (currentValue - 500 >= minValue) {
            select.value = (currentValue - 500).toString();
        }
    }

    function incrementPoints() {
        var select = document.getElementsByName('points')[0];
        var currentValue = parseInt(select.value);
        var maxValue = parseInt(select.options[select.options.length - 1].value);
        if (currentValue + 5 <= maxValue) {
            select.value = (currentValue + 5).toString();
        }
    }

    function decrementPoints() {
        var select = document.getElementsByName('points')[0];
        var currentValue = parseInt(select.value);
        var minValue = parseInt(select.options[0].value);
        if (currentValue - 5 >= minValue) {
            select.value = (currentValue - 5).toString();
        }
    }
</script>
