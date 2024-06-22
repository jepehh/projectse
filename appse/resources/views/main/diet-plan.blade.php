<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat Program</title>
    <link rel="stylesheet" href="{{ asset('css/eatprog.css') }}">
</head>
<body>
    <div class="header">
        <button class='logo' onclick="window.location.href='{{ route('dashboard') }}'">
            <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
        </button>
        <h1>Eat Program</h1>
    </div>
    <h1 class="goal">What's your goal?</h1>
    <div class="content">
        <div class="box">
            <h1>Lose Weight</h1>
            <p>Manage weight by eating smarter</p>
        </div>
        <div class="box">
            <h1>Maintain Weight</h1>
            <p>Optimize your well-being</p>
        </div>
        <div class="box">
            <h1>Gain Weight</h1>
            <p>Build your body strength</p>
        </div>
        <button id="submit-btn" type="submit">Next</button>
    </div>
    <script>
        document.getElementById('submit-btn').addEventListener('click', function() {
            window.location.href = '{{ route('dashboard-eatprog') }}';
        });
    </script>
</body>
</html>
