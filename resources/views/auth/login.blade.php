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
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@section('login-regisrer')
    <!-- فرم ورود -->
    <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="loginEmail" class="block text-slate-300 mb-2">ایمیل یا شماره موبایل</label>
            <div class="relative">
                <input type="text" id="loginEmail" class="form-input pr-12" placeholder="example@email.com">
                <i class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
            </div>
            <div id="loginEmailError" class="error-message">لطفا ایمیل یا شماره موبایل معتبر وارد کنید</div>
        </div>
        
        <div>
            <label for="loginPassword" class="block text-slate-300 mb-2">رمز عبور</label>
            <div class="relative">
                <input type="password" id="loginPassword" class="form-input pr-12" placeholder="••••••••">
                <i class="fas fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                <span class="password-toggle" id="toggleLoginPassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <div id="loginPasswordError" class="error-message">رمز عبور باید حداقل ۸ کاراکتر باشد</div>
        </div>
        
        <div class="flex justify-between items-center"> 
            <a href="#" class="text-primary hover:text-indigo-300 transition-colors duration-300 text-sm">رمز عبور را فراموش کرده‌اید؟</a>
        </div>
        
        <button type="submit" class="primary-gradient hover:shadow-lg hover:shadow-indigo-500/30 w-full py-4 rounded-xl font-bold transition-all duration-300 shine-effect">
            ورود به حساب کاربری
        </button>
    </form>
@endsection