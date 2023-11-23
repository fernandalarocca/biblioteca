<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
</head>
<body>
@include("layouts.assets.bootstrap")
@include("layouts.partials.navbar")
@yield('content')

<div class="d-flex align-items-center justify-content-center vh-100">
    <h1 class="text-light text-center fw-bolder">
        BEM-VINDO!
    </h1>
</div>
</body>
</html>
