<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title','Cancer Treatment')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <!-- <link href="{{ asset('/css/custom.min.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/fastclick/lib/fastclick.js') }}"></script>
</body>
</html>