@extends('user.user')

@section('title', config('app.name', 'Laravel'))

@section('content')
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Body Measurements</h6>
                </div>
                <div class="card-body">
                    @if (Auth::user()->weight && Auth::user()->height)
                        @php
                            $weight = Auth::user()->weight;
                            $height = Auth::user()->height;
                            $bmi = $weight / (($height / 100) * ($height / 100));
                            $bmi = number_format((float) $bmi, 2, '.', '');
                            $bmiClass = '';
                            if ($bmi < 18.5) {
                                $bmiClass = 'Underweight';
                            } elseif ($bmi >= 18.5 && $bmi < 25) {
                                $bmiClass = 'Normal weight';
                            } elseif ($bmi >= 25 && $bmi < 30) {
                                $bmiClass = 'Overweight';
                            } elseif ($bmi >= 30) {
                                $bmiClass = 'Obese';
                            }
                        @endphp
                        <p style="font-weight:bold;">Weight: {{ $weight }} kg</p>
                        <p style="font-weight:bold;">Height: {{ $height }} cm</p>
                        <p style="font-weight:bold;">BMI: {{ $bmi }} ({{ $bmiClass }})</p>
                    @else
                        <p style="font-weight:bold;">Weight: </p>
                        <p style="font-weight:bold;">Height: </p>
                        <p style="font-weight:bold;">BMI: </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Videos</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <div class="card h-100">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/cZyHgKtK75A"></iframe>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">Cardio Workout At Home - 30 Min Aerobic Exercise</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                        src="https://www.youtube.com/embed/IrA9dvgRKR0"></iframe>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">10 Minute Ab Workout</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
