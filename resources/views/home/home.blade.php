<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark scroll-smooth">
    <head>
        @section('title', 'Home')

        @include('layouts.head-tag')
    </head>

    <body class="bg-light-bg dark:bg-dark-bg text-light-text dark:text-dark-text min-h-screen font-sans transition-all duration-500">
        <!-- Header Section -->

        @include('layouts.partials.header')

        <!-- Hero Section -->

        @include('layouts.hero')

        <!-- Featured Post -->

        @include('layouts.featured-post')

        <!-- Recent Posts -->

        @include('layouts.recent-posts')

        <!-- About Section -->

        @include('layouts.about')

        <!-- Contact Section -->

        @include('layouts.contact')

        <!-- Footer -->

        @include('layouts.partials.footer')
    </body>
    <script src="{{ asset('js/home.js') }}"></script>
</html>