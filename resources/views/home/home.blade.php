<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark scroll-smooth">
    <head>
        @section('title', 'Home')

        @include('home.layouts.head-tag')
    </head>

    <body class="bg-light-bg dark:bg-dark-bg text-light-text dark:text-dark-text min-h-screen font-sans transition-all duration-500">
        <!-- Header Section -->

        @include('home.layouts.partials.header')

        <!-- Hero Section -->

        @include('home.layouts.hero')

        <!-- Featured Post -->

        @include('home.layouts.featured-post')

        <!-- Recent Posts -->

        @include('home.layouts.recent-posts')

        <!-- About Section -->

        @include('home.layouts.about')

        <!-- Contact Section -->

        @include('home.layouts.contact')

        <!-- Footer -->

        @include('home.layouts.partials.footer')
    </body>
    <script src="{{ asset('js/home.js') }}"></script>
</html>