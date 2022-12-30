<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <style>
    body {
        background-color: #e6e6e6;
    }
    </style>

  </head>
  <body>

    @yield('nav')

    <div class="content">
    @yield('content')
    </div>

    <script src="{{ mix('js/main.js') }}"></script>

  </body>
</html>