<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    @include('libraries.styles')
    @yield('customCSS')

<body class="antialiased h-screen overflow-hidden m-0 p-0">
    <div class="fixed top-0 left-0 right-0 h-16 z-50 bg-slate-950 border-b border-slate-900">
        @include('components.nav-bar')
    </div>

    <div class="flex h-screen pt-16 overflow-hidden">

        @include('components.side-bar')

        <main class="flex-1 p-6 md:p-10 pb-20 md:pb-10 overflow-y-auto">
            @yield('content')
        </main>

    </div>

    @include('libraries.script')
    @yield('customJS')
        <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    init();
                    events();
                    validations();

                });
        </script>
</body>

</html>
