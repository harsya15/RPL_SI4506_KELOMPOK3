
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('images')}}/logobalibul.png" type="image/png">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.css">
    
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.css">

    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700|Poppins:300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/LineIcons.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/default.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">

    <link rel="stylesheet" href="{{asset('frontend')}}/css/glightbox.min.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
</head>

<body>

    @include('layouts.landingPage.partial.header')

    @yield('content')

    @include('layouts.landingPage.partial.footer')

</body>

    <script src="{{asset('frontend')}}/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{asset('frontend')}}/js/vendor/modernizr-3.7.1.min.js"></script>

    <script src="{{asset('frontend')}}/js/boostrap.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.easing.min.js"></script>
    <script src="{{asset('frontend')}}/js/main.js"></script>
    <script src="{{asset('frontend')}}/js/popper.min.js"></script>
    <script src="{{asset('frontend')}}/js/scrolling-nav.js"></script>
    <script src="{{asset('frontend')}}/js/slick.min.js"></script>
    <script src="{{asset('frontend')}}/js/wow.min.js"></script>
    <script src="{{asset('frontend')}}/js/glightbox.min.js"></script>

    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        

</html>

