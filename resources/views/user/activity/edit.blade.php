@extends('user.user')

@section('title', 'Activity')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Activity
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
                <form action="{{ url('edit-activity/' . $activity->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                <input type="text" value="{{ $activity->title }}" name="title"
                                                    id="" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Activity Type</label>
                                                <select class="form-control form-select-sm"
                                                    aria-label=".form-select-lg example" required name="type">
                                                    <option value="walking"
                                                        @if (old($activity->type) == 'walking') {{ 'selected' }} @endif>Walking
                                                    </option>
                                                    <option value="running"
                                                        @if (old($activity->type) == 'running') {{ 'selected' }} @endif>Running
                                                    </option>
                                                    <option value="cycling"
                                                        @if (old($activity->type) == 'cycling') {{ 'selected' }} @endif>Cycling
                                                    </option>
                                                    <option value="swimming"
                                                        @if (old($activity->type) == 'swimming') {{ 'selected' }} @endif>
                                                        Swimming</option>
                                                    <option value="yoga"
                                                        @if (old($activity->type) == 'yoga') {{ 'selected' }} @endif>Yoga
                                                    </option>
                                                    <option value="weightlifting"
                                                        @if (old($activity->type) == 'weightlifting') {{ 'selected' }} @endif>
                                                        Weightlifting</option>
                                                    <option value="dancing"
                                                        @if (old($activity->type) == 'dancing') {{ 'selected' }} @endif>
                                                        Dancing</option>
                                                    <option value="pilates"
                                                        @if (old($activity->type) == 'pilates') {{ 'selected' }} @endif>
                                                        Pilates</option>
                                                    <option value="hiking"
                                                        @if (old($activity->type) == 'hiking') {{ 'selected' }} @endif>Hiking
                                                    </option>
                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" value="{{ $activity->activity_date}}" name="activity_date" id="" class="form-control">
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Start Time</label>
                                                <input type="time" value="{{ $activity->starttime}}" name="starttime" id="" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">End Time</label>
                                                <input type="time" value="{{ $activity->endtime}}" name="endtime" id="" class="form-control"
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
                                                <input type="number" value="{{ $activity->steps}}" name="steps" id="steps" class="form-control"
                                                    required oninput="calculatePointsDistanceAndCalories()">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">Points</label>
                                                <input type="number" value="{{ $activity->points}}" name="points" id="points" class="form-control"
                                                    required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="distance">Distance (Kilometres)</label>
                                                <input type="number" value="{{ $activity->distance}}" name="distance" id="distance" class="form-control"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="calories">Calories</label>
                                                <input type="number" value="{{ $activity->energy}}" name="energy" id="calories" class="form-control"
                                                    required readonly>
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
