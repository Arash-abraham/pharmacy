@extends('app.layouts.master')

@section('title', $post->title)

@section('content')
    <br><br><br>
    <div class="container mx-auto px-4 py-8 bg-gray-900 text-white">
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
                <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mb-6">
                    @csrf
                    <div class="mb-4">
                        <textarea name="comment" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-600" placeholder="Write your comment..." required></textarea>
                    </div>
                    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-300">Submit Comment</button>
                </form>

            </div>
        </div>
    </div>
@endsection