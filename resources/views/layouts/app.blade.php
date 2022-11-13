<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name','MASOMO')}}</title>
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logo.png') }}">
        <script src="{{ asset('moment/moment.min.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.partials.navbar')
            @include('layouts.partials.sidebar')

            <div class="content-wrapper">

                <div class="content">
                    <div class="card">
                        <div class="card-body">
                            {{$slot}}
                        </div>
                    </div>
                </div>

            </div>
            @include('layouts.partials.footer')

        </div>
        @stack('js')
        @livewireScripts
    </body>
</html>
