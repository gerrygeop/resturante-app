<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;300;400&display=swap" rel="stylesheet">
   <style>
      .font-google {
         font-family: 'Commissioner', sans-serif;
      }

      [x-cloak] {
         display: none;
      }
   </style>

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])

   @stack('css')
</head>

<body class="font-google bg-slate-100 dark:bg-slate-800 antialiased">
   @yield('content')

   @stack('js')
</body>

</html>
