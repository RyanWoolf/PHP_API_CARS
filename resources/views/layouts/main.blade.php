<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-179954eb.css') }}"> --}}
    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    @vite('resources/js/app.js')
    {{-- @vite('resources/css/app.css') --}}
    {{-- <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet"> --}}

    <title>Document</title>
  </head>
  <body class="bg-gray-400">
    
    @yield('content')
  </body>
</html>