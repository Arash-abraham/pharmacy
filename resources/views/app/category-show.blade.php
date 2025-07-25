@extends('app.layouts.master')

@section('title', 'Category')

@section('content')
    <div class="wrapper">
        <section class="featured-section">
            <br>
            <br>
            <h2 class="featured-title">Animes</h2>
            <div class="anime-grid">
            @if($posts->isEmpty())
                <br>
                <p>Sorry, we couldn't find any posts in "{{ $category->name }}".</p>
            @else
                @foreach ($posts as $post)
                    <div class="anime-card">
                        <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="anime-image">
                        <div class="anime-content">
                            <h3 class="anime-title">{{ $post['title'] }}</h3>
                            <p>{{ substr($post['description'], 0, 36) }} ...</p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="anime-link">Details</a>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </section>
    </div>
@endsection 