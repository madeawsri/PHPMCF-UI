<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ProjectName')</title>

    {{-- CSS และ Plugin --}}
    @include('partials.head')

    {!! $__css_module ?? '' !!}
    @stack('head')
    {!! $__jsConfig ?? '' !!}
</head>
<body class="bg-gray-50 text-gray-800">
    {{-- Header --}}
    @include('components.header')

    {{-- Main --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- JS --}}
    @include('partials.scripts')

    {!! $__js_module ?? '' !!}
    @yield('js')
    @stack('scripts')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
