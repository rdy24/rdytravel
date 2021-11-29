<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @include('includes.style')
    @stack('addon-style')

    <title>
      @yield('title')
    </title>
  </head>
  <body>
    <!-- Navbar -->
    @include('includes.navbar-alternate')
    <!-- Akhir Navbar -->

    @yield('content')
  </body>
</html>
