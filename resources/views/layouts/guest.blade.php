<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name','AFIA')}}</title>
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logo.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="hold-transition login-page">
        {{ $slot }}
    </body>
</html>
