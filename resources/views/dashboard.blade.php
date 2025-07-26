<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Hub - Dashboard</title>
    @vite(['resources/css/dashboard.css', 'resources/js/app.js'])

</head>
<body>
    <!-- Header with Home, Profile, Logout -->
    <header class="header">
        <div class="header-container">
            <div class="logo-container">
                <a href="/" class="site-title">AnimeHub</a>
            </div>
            <nav class="nav">
                <a href="/" class="nav-link">Home</a>
                <a href="{{ route('animes') }}" class="nav-link">Animes</a>
                <a href="{{ route('category.index') }}" class="nav-link">Genres</a>
            </nav>
            <div class="auth-buttons">
                @guest
                    <a href="{{ route('login') }}" class="auth-button login-button">Login</a>
                    <a href="{{ route('register') }}" class="auth-button signup-button">Sign Up</a>
                @else
                    <a href="{{ route('dashboard') }}" class="profile-link">{{ auth()->user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="auth-button logout-button">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>
    
    <!-- Main Content Area -->
    <main class="main-content">
        <h1 class="page-title">Comments I've Posted</h1>
        
        <div class="comments-section">
            <!-- Comment 1 -->
            <div class="comment-item">
                <div class="comment-header">
                    <span class="anime-title">Attack on Titan: Final Season</span>
                    <span class="comment-date">March 15, 2023</span>
                </div>
                <p class="comment-text">
                    The animation quality in this episode was incredible! The fight between Eren and Reiner was so intense. MAPPA really outdid themselves with this adaptation.
                </p>
                <div class="comment-actions">
                    <button>Edit</button>
                    <button>Delete</button>
                    <button>View Post</button>
                </div>
            </div>
            
            <!-- Comment 2 -->
            <div class="comment-item">
                <div class="comment-header">
                    <span class="anime-title">Jujutsu Kaisen</span>
                    <span class="comment-date">February 28, 2023</span>
                </div>
                <p class="comment-text">
                    Gojo's power is just insane! That domain expansion scene gave me chills. Can't wait to see how they animate the Shibuya Incident arc.
                </p>
                <div class="comment-actions">
                    <button>Edit</button>
                    <button>Delete</button>
                    <button>View Post</button>
                </div>
            </div>
            
            <!-- Comment 3 -->
            <div class="comment-item">
                <div class="comment-header">
                    <span class="anime-title">Demon Slayer: Entertainment District Arc</span>
                    <span class="comment-date">January 10, 2023</span>
                </div>
                <p class="comment-text">
                    Ufotable's animation is just on another level. The way they animated Tengen's musical score technique was breathtaking. Best episode of the season!
                </p>
                <div class="comment-actions">
                    <button>Edit</button>
                    <button>Delete</button>
                    <button>View Post</button>
                </div>
            </div>
        </div>
    </main>
    <x-footer />

</body>
