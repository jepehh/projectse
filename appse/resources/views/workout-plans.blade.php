<!-- resources/views/workout-plans.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Plans</title>
    <link rel="stylesheet" href="{{ asset('css/workout-plans.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <button class='logo' onclick="window.location.href='{{ route('dashboard') }}'">
                <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
            </button>
            <h1>Workout Plans</h1>
        </div>
        @if($workoutPlans->isEmpty())
            <p>No workout plans found.</p>
        @else
            @foreach($workoutPlans as $plan)
                <div class="workout-plan">
                    <h2>{{ $plan->plan_name }}</h2>
                    <p>Total Duration: {{ gmdate('H:i:s', $plan->total_duration) }}</p>
                    <a href="{{ route('workout.view.plan', $plan->id) }}">View Plan</a>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
