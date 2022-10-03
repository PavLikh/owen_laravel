<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title-block') </title>
</head>
<body>
<script type="text/javascript">
 </script>
    <header>
        @include('inc.header')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
