@extends('app.layouts.master')

@section('title', $post->title)

@section('header')
    @include('app.layouts.header')
@endsection

@section('content')
    <br><br><br>
    <div class="container mx-auto px-4 py-8 bg-gray-900 text-white">
        <br><br><br>
        @if (session('success'))
            <div id="success-alert" class="mb-6 p-4 bg-green-600 text-white rounded-lg shadow-md flex justify-between items-center transition-all duration-300">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('success-alert').remove()" class="text-white hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
        <div class="w-full max-w-4xl mx-auto">
            @if ($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover rounded-lg shadow-lg mb-6">
            @else
                <div class="w-full h-96 bg-gray-700 flex items-center justify-center rounded-lg shadow-lg mb-6">
                    <span class="text-gray-400">No Image Available</span>
                </div>
            @endif
        </div>

        <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-3xl font-bold text-white mb-4">{{ $post->title }}</h2>
            <p class="text-gray-300 leading-relaxed">{{ $post->description }}</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <h3 class="text-2xl font-semibold text-white mb-4">Comments</h3>
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                @auth
                    <!-- Display comment form if user is logged in -->
                    <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mb-6">
                        @csrf
                        <div class="mb-4">
                            <textarea name="comment" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-600" placeholder="Write your comment..." required></textarea>
                            @error('comment')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300">Submit Comment</button>
                    </form>
                @else
                    <!-- Display login prompt if user is not logged in -->
                    <div class="mb-6 text-center">
                        <p class="text-white mb-4">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> to leave a comment.</p>
                    </div>
                @endauth
        
                <!-- Display existing comments -->
                <div class="comments-list">
                    @forelse ($post->comments as $comment)
                        <div class="comment mb-4 p-4 bg-gray-700 rounded-lg">
                            <div class="flex items-center mb-2">
                                <span class="text-white font-semibold">{{ $comment->user->name }}</span>
                                <span class="text-gray-400 text-sm ml-2">{{ $comment->created_at->timezone(config('app.timezone'))->format('Y-m-d H:i:s') }}</span>
                            </div>
                            <p class="text-white">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <p class="text-gray-400 text-center">No comments yet. Be the first to comment!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection