<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Turning Talks Bangladesh @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('frontend.includes.css')
</head>
<body>

    @include('frontend.includes.header')

    @yield('body')

    @include('frontend.includes.footer')

    @include('frontend.includes.script')


</body>
</html>
