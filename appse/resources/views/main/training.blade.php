<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('dashboard') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>Training Program</h1>
    </div>
    <div class="consultation" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/consultation.jpeg') }}');">
        <h1>Consultation</h1>
        <p>Meeting with an expert or professionals.</p>
    </div>
    <div class="content">
        <div class="box" data-url="{{ route('upper-body') }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/upper-body.jpg') }}');">
            <h1>Upper Body</h1>
        </div>
        <div class="box" data-url="{{ route('lower-body') }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/lower-body.jpg') }}');">
            <h1>Lower Body</h1>
        </div>
        <div class="box" data-url="{{ route('full-body') }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/full-body.jpeg') }}');">
            <h1>Full Body</h1>
        </div>
        <div class="box" data-url="{{ route('beginner') }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/nerd.png') }}');">
            <h1>Beginner</h1>
        </div>
    </div>

    <div class="search-gym" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/search-gym.jpeg') }}');" onclick="window.location.href='{{ route('workout.plans') }}'">
        <h1>See Workout Plans</h1>
    </div>

    <script>
        document.querySelectorAll('.box').forEach(function (box) {
            box.addEventListener('click', function () {
                var url = box.getAttribute('data-url');
                window.location.href = url;
            });
        });
    </script>
</body>
</html>
