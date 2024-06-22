<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Details</title>
    <link rel="stylesheet" href="{{ asset('css/register-details.css') }}">
</head>
<body>
    <button class='logo' onclick="window.location.href='{{ route('landing-page') }}'">
        <img src="{{ asset('images/chevron-left.png') }}" alt="Logo">
    </button>
    <div class="content">
        <h1>Sign Up</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif 
        <form method="POST" action="{{ route('register.details.submit', ['id' => $id]) }}">
            @csrf
            <div class="input-field">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Rather Not Say</option>
                </select>
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
                @error('dob')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="height">Height (in cms)</label>
                <input placeholder='Your height' type="number" id="height" name="height" step="0.1" required>
                @error('height')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="weight">Weight (in kgs)</label>
                <input placeholder='Your weight' type="number" id="weight" name="weight" step="0.1" required>
                @error('weight')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="waist">Waist (in cms)</label>
                <input placeholder='Waist length' type="number" id="waist" name="waist" step="0.1" required>
                @error('waist')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="chest">Chest (in cms)</label>
                <input placeholder='Chest length' type="number" id="chest" name="chest" step="0.1" required>
                @error('chest')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-field">
                <label for="body_fat">Body Fat (in %)</label>
                <input placeholder='Body fat' type="number" id="body_fat" name="body_fat" step="0.1" required>
                @error('body_fat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button class='submission' type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
