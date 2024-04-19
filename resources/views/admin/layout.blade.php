<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title', 'Cancer Treatment') </title>

    <!-- Bootstrap -->
    <!-- Font Awesome -->
    <!-- NProgress -->

    <!-- Custom Theme Style -->

    @yield('head_links')
</head>

<body>
    @include('admin.includes.sidebar')
    @yield('content')
    @yield('foot_links')
</body>

</html>
