<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Workout Plan</title>
    <link rel="stylesheet" href="{{ asset('css/view-workout-plan.css') }}">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('workout.plans') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>View Workout Plan</h1>
    </div>
    <div class="workouts">
        @foreach($workouts as $workout)
            <div class="workout">
                <h2>{{ $workout->workout_name }}</h2>
                <p><strong>Target:</strong> {{ $workout->workout_target }}</p>
                <p><strong>Difficulty:</strong> {{ $workout->workout_difficulty }}</p>
                <p><strong>Recommended Sets:</strong> {{ $workout->workout_recommended_sets }}</p>
                <p><strong>Recommended Weights:</strong> {{ $workout->workout_recommended_weights }} kg</p>
                <p><strong>Duration:</strong> {{ $workout->workout_duration }}</p>
                <button class="remove-workout-btn" data-id="{{ $workout->id }}" data-plan-id="{{ $id }}">Remove</button> <!-- Add data-plan-id -->
            </div>
        @endforeach
    </div>
    <h3>Total Duration: {{ gmdate('H:i:s', $totalDuration) }}</h3>
    <script>
        document.querySelectorAll('.remove-workout-btn').forEach(button => {
            button.addEventListener('click', function() {
                const workoutId = this.getAttribute('data-id');
                const planId = this.getAttribute('data-plan-id'); // Get the plan ID
                fetch('{{ route("workout.remove.from.finalized.plan") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ workout_id: workoutId, plan_id: planId }) // Include plan ID
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        this.closest('.workout').remove();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
