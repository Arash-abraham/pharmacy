<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('app.layouts.head-tag')
</head>
<body class="gradient-bg">

    @yield('content')

    @include('app.layouts.partials.footer')
    
    @yield('scripts')
</body>
</html>