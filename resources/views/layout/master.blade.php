<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    @include('libraries.styles')
    @yield('customCSS')
<body>
    @yield('content')

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
