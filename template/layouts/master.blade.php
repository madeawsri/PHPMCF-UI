<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bulma CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="/assets/css/admin.css" rel="stylesheet">
    
    @stack('css')
    <style>[x-cloak]{display:none!important;} body{visibility:hidden;} body.loaded{visibility:visible;}</style>
</head>
<body class="has-navbar-fixed-top">
    @if(!Request::is('login'))
        @include('partials.navbar')
        @include('partials.sidebar')
    @endif

    <div class="container is-fluid">
        @yield('content')
    </div>

    @if(!Request::is('login'))
        @include('partials.footer')
    @endif

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <!-- Custom JS -->
    <script src="/assets/js/admin.js"></script>
    
    @stack('scripts')
    
    <script>
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>