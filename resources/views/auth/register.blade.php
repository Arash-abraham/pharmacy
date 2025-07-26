<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Hub - Register</title>
    @vite(['resources/css/register.css', 'resources/js/app.js'])
</head>
<body>
    <div class="register-container">
        <h1>Join AnimeHub</h1>
        
        <!-- Error Alert Container -->
        <div id="error-alert" class="error-alert hidden">
            <span id="error-message"></span>
        </div>
        
        <form action="{{ route('register') }}" method="post" id="register-form">
            @csrf
            <div class="input-group">
                <label for="username">Name</label>
                <input type="text" id="name" name="name" placeholder="name" autocomplete="name" value="{{ old('name') }}">
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" autocomplete="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="new-password">
                <div class="password-strength">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" placeholder="••••••••" autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="terms">
                By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
            </div>
            
            <button class="register-btn" type="submit">Create Account</button>
        </form>
        
        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>

    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>