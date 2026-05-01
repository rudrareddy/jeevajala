<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jeevajala Alkaline Water - Pure Hydration for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/profile.css')}}">
    <link rel="stylesheet" href="{{asset('site/welcome.css')}}">
</head>
<body>
     @include('site_includes.header')
      @yield('content')
     @include('site_includes.footer')

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('site/script.js')}}"></script>
    <script src="{{asset('site/profile.js')}}"></script>
    <script src="{{asset('site/credit_request.js')}}"></script>
</body>
</html>
