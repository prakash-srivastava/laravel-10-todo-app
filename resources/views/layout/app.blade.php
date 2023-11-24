<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Prakash Srivastav">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>Taravel 10 Todo App</title>

        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>

        <div class="container">

            @include('layout.partials.navigation')

            @include('common.status')

            <div class="mt-4">
                @yield('content')
            </div>

        </div>

        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
