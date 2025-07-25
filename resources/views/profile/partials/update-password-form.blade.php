<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-200">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" class="text-white" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full bg-gray-700 text-gray-900 border-gray-600 rounded-md" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" class="text-white" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full bg-gray-700 text-gray-900 border-gray-600 rounded-md" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-gray-700 text-gray-900 border-gray-600 rounded-md" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-purple-600 hover:bg-purple-700 text-white">{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>