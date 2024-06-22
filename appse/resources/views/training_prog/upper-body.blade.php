<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upper-Body</title>
    <link rel="stylesheet" href="{{ asset('css/upper-body.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('dashboard') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>Upper Body</h1>
    </div>

    <div class="search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" id="search-input" placeholder='Search workout...'>
    </div>

    <h3 class="filters-title">Filters</h3>
    <div class="filters">
        @foreach($workoutTargets as $target)
            <label>
                <input type="checkbox" class="target-checkbox filter-checkbox" value="{{ strtolower($target) }}">
                {{ ucfirst($target) }}
            </label>
        @endforeach
    </div>
    <div class="FILLER"></div>
    <div class="workouts" id="workout-list">
        @foreach($workouts as $workout)
            <div class="workout" data-name="{{ strtolower($workout->workout_name) }}" data-target="{{ strtolower($workout->workout_target) }}" data-id="{{ $workout->id }}">
                <h2>{{ $workout->workout_name }}</h2>
                <div class="workouts-rows">
                    @if($workout->image_path)
                        <img src="{{ asset('storage/' . $workout->image_path) }}" alt="{{ $workout->workout_name }} Image" width="200">
                    @endif
                    <p><strong>Target:</strong> {{ $workout->workout_target }}</p>
                    <p><strong>Difficulty:</strong> {{ $workout->workout_difficulty }}</p>
                    <p><strong>Recommended Sets:</strong> {{ $workout->workout_recommended_sets }}</p>
                    <p><strong>Recommended Weights:</strong> {{ $workout->workout_recommended_weights }} kg</p>
                    <p><strong>Duration:</strong> {{ $workout->workout_duration }}</p>
                    <button class="add-workout-btn">Add</button>
                </div>
            </div>
        @endforeach
    </div>


    <button id="finalize-plan-btn">Finalize Workout Plan</button>
    <button id="view-plan-btn">View Current Workout Plan</button>

    <div class="overlay" id="workout-plan-overlay">
        <div class="overlay-content">
            <span class="close-btn" id="close-overlay-btn">&times;</span>
            <h2>Your Workout Plan</h2>
            <div id="overlay-workout-list">
                <!-- Workouts will be dynamically added here -->
            </div>
            <h3>Total Duration: <span id="total-duration">00:00:00</span></h3>
            <input type="text" id="plan-name" placeholder="Enter plan name">
            <button id="publish-plan-btn">Publish Workout Plan</button>
        </div>
    </div>

    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            filterWorkouts();
        });

        document.querySelectorAll('.target-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                filterWorkouts();
            });
        });

        function filterWorkouts() {
            const searchValue = document.getElementById('search-input').value.toLowerCase();
            const selectedTargets = Array.from(document.querySelectorAll('.target-checkbox:checked')).map(cb => cb.value);
            const workouts = document.querySelectorAll('.workout');

            workouts.forEach(workout => {
                const name = workout.getAttribute('data-name');
                const target = workout.getAttribute('data-target');
                if (name.includes(searchValue) && (selectedTargets.length === 0 || selectedTargets.includes(target))) {
                    workout.style.display = '';
                } else {
                    workout.style.display = 'none';
                }
            });
        }

        document.querySelectorAll('.add-workout-btn').forEach(button => {
            button.addEventListener('click', function() {
                const workoutId = this.closest('.workout').getAttribute('data-id');
                console.log(`Adding workout ID: ${workoutId}`);

                fetch('{{ route("workout.add.to.plan") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ workout_id: workoutId })
                })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => { throw new Error(text) });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    alert('Workout added to plan successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });
            });
        });

        document.getElementById('view-plan-btn').addEventListener('click', function() {
            console.log('Viewing current workout plan');
            fetch('{{ route("workout.current.plan") }}')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const overlay = document.getElementById('workout-plan-overlay');
                const workoutList = document.getElementById('overlay-workout-list');
                const totalDuration = document.getElementById('total-duration');
                workoutList.innerHTML = '';
                totalDuration.textContent = data.totalDuration;
                data.workouts.forEach(workout => {
                    const div = document.createElement('div');
                    div.className = 'workout';
                    div.innerHTML = `
                        <h2>${workout.workout_name}</h2>
                        <p><strong>Target:</strong> ${workout.workout_target}</p>
                        <p><strong>Difficulty:</strong> ${workout.workout_difficulty}</p>
                        <p><strong>Recommended Sets:</strong> ${workout.workout_recommended_sets}</p>
                        <p><strong>Recommended Weights:</strong> ${workout.workout_recommended_weights} kg</p>
                        <p><strong>Duration:</strong> ${workout.workout_duration}</p>
                        <button class="remove-workout-btn" data-id="${workout.id}">Remove</button>
                    `;
                    workoutList.appendChild(div);
                });
                document.querySelectorAll('.remove-workout-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const workoutId = this.getAttribute('data-id');
                        console.log(`Removing workout ID: ${workoutId}`);
                        fetch('{{ route("workout.remove.from.plan") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ workout_id: workoutId })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            alert(data.message);
                            if (data.success) {
                                this.parentElement.remove();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    });
                });
                overlay.style.display = 'flex';
            })
            .catch(error => console.error('Error:', error));
        });

        document.getElementById('close-overlay-btn').addEventListener('click', function() {
            document.getElementById('workout-plan-overlay').style.display = 'none';
        });

        document.getElementById('publish-plan-btn').addEventListener('click', function() {
            const planName = document.getElementById('plan-name').value;
            if (!planName) {
                alert('Please enter a plan name');
                return;
            }
            console.log(`Publishing workout plan: ${planName}`);
            fetch('{{ route("workout.publish.plan") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ plan_name: planName })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    alert('Workout plan published successfully');
                    window.location.href = '{{ route("training") }}'; // Redirect to training page
                } else {
                    alert('Failed to publish workout plan');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        document.getElementById('finalize-plan-btn').addEventListener('click', function() {
            console.log('Finalizing workout plan');
            fetch('{{ route("workout.finalize.plan") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    window.location.href = '{{ route("training") }}'; // Redirect to training page
                } else {
                    alert('Failed to finalize workout plan');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
