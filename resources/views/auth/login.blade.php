{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Hub - Login</title>
    @vite(['resources/css/login.css', 'resources/js/app.js'])
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back!</h1>
        
        <!-- Error Alert Container -->
        <div id="error-alert" class="error-alert hidden">
            <span id="error-message"></span>
        </div>
        
        <form action="{{ route('login') }}" method="post" id="login-form">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" autocomplete="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password">
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <button class="login-btn" type="submit">Log In</button>
        </form>
        
        <div class="divider">
            <span>OR CONTINUE WITH</span>
        </div>
        
        <div class="footer-links">
            <a href="#">Forgot password?</a>
            <a href="{{ route('register') }}">Create account</a>
            <a href="#">Help Center</a>
        </div>
    </div>
    
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>