<header class="header">
    <div class="header-container">
        <div class="logo-container">
            <a href="/" class="site-title">Anime Hub</a>
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