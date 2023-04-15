@extends('user.user')

@section('title', 'Activity')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Activity</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('add-activity') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mt-1">
                                <div class="card-header">
                                    <h6>Activity Info</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Activity Title</label>
                                                <input type="text" name="title" id="" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Activity Type</label>
                                                <select class="form-control form-select-sm"
                                                    aria-label=".form-select-lg example" required="required" name="type">
                                                    <option value="" selected disabled hidden>Choose activity type
                                                    </option>
                                                    <option value="walking">Walking</option>
                                                    <option value="aerobics">Aerobics</option>
                                                    <option value="boxing">Boxing</option>
                                                    <option value="cycling">Cycling</option>
                                                    <option value="hiking">Hiking</option>
                                                    <option value="jogging">Jogging</option>
                                                    <option value="swimming">Swimming</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="activity_date" id="" class="form-control">
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Start Time</label>
                                                <input type="time" name="starttime" id="" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">End Time</label>
                                                <input type="time" name="endtime" id="" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mt-1">
                                <div class="card-header">
                                    <h6>Effort</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="steps">Steps</label>
                                                <input type="number" name="steps" id="steps" class="form-control"
                                                    required oninput="calculatePointsDistanceAndCalories()">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">Points</label>
                                                <input type="number" name="points" id="points" class="form-control"
                                                    required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="distance">Distance (Kilometres)</label>
                                                <input type="number" name="distance" id="distance" class="form-control"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="calories">Calories</label>
                                                <input type="number" name="energy" id="calories" class="form-control"
                                                    required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- Import the user model -->
@use App\Models\User;

<!-- Retrieve the authenticated user's ID -->
@php
    $userId = Auth::id();
@endphp

<!-- Retrieve the authenticated user's target steps from the database -->
@php
    $user = App\Models\User::findOrFail($userId);
    $targetSteps = $user->target;
    $targetPoints = $user->points;
@endphp

<script>
    function calculatePointsDistanceAndCalories() {
        var steps = document.getElementById('steps').value;
        var conversionRate = {{ $targetPoints / $targetSteps }};
        var points = steps * conversionRate;
        document.getElementById('points').value = points;

        const stepsMade = parseInt(document.getElementById("steps").value);
        const strideLength = 0.762; // average stride length in meters
        const distance = (stepsMade * strideLength) / 1000; // distance in kilometers
        const calories = Math.round((distance * 50) / 1.609); // calories burned assuming 50 calories per mile
        document.getElementById("distance").value = distance.toFixed(2);
        document.getElementById("calories").value = calories;
    }
</script>
