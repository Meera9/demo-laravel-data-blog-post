<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @yield('title')
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="{{asset('web/css/index.css')}}" rel="stylesheet" />
</head>
<body>
    @include('web.header')
    @yield('content')
    @include('web.footer')
</body>
</html>
