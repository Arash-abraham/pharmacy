@extends('app.layouts.master')

@section('title', 'Dashboard')

@section('header')
    @include('app.layouts.header')
@endsection

@push('styles')
    @vite(['resources/css/dashboard.css' , 'resources/js/app.js'])
@endpush

@section('content')
    <body>
        <!-- Main Content Area -->
        <main class="main-content">
            
            <h1 class="page-title">Comments I've Posted</h1>
            @if (session('success'))
                <div id="success-alert" class="alert-success">
                    <span>{{ session('success') }}</span>
                    <button onclick="document.getElementById('success-alert').remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="comments-section">
                @forelse ($comments as $comment)
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="anime-title">{{ $comment->post->title }}</span>
                            <span class="comment-date">{{ $comment->created_at->format('F j, Y') }}</span>
                        </div>
                        <p class="comment-text">
                            {{ $comment->comment }}
                        </p>
                        <div class="comment-actions">
                            <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No comments posted yet.</p>
                @endforelse
            </div>
        </main>
    </body>
@endsection 