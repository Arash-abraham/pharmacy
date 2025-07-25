@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <br>
    <br>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-6 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-md mx-auto text-gray-900">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-md mx-auto text-gray-900">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-6 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-md mx-auto text-gray-900">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection