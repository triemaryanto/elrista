<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{ asset('multikart_all_in_one/') }}/assets/images/favicon/2.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('multikart_all_in_one/') }}/assets/images/favicon/2.png"
        type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/font-awesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('multikart_all_in_one/') }}/assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('multikart_all_in_one/') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('costum/') }}/color.css" !important>
    @stack('css')
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body class="theme-color-2 section-white">

    <!-- Main header -->
    @include('layouts.front.header')
    <!-- /main header -->

    {{ $slot ?? '' }}

    <!-- footer section start -->
    @include('layouts.front.footer')
    <!-- footer section end -->

    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->

    @livewireScripts

    <!-- latest jquery-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/jquery-3.3.1.min.js"></script>

    <!-- slick js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/slick.js"></script>

    <!-- wow js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/wow.min.js"></script>

    <!-- menu js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/menu.js"></script>

    <!-- Timer js-->
    {{-- <script src="{{ asset('multikart_all_in_one/') }}/assets/js/timer.js"></script> --}}

    <!-- slick js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/slick.js"></script>

    <!-- lazyload js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/bootstrap-notify.min.js"></script>

    <!-- Theme js-->
    {{-- <script src="{{ asset('multikart_all_in_one/') }}/assets/js/theme-setting.js"></script> --}}
    <script src="{{ asset('multikart_all_in_one/') }}/assets/js/script.js"></script>
    <script src="{{ asset('costum/') }}/color.js"></script>
    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('#exampleModal').modal('show');
            }, 2500);
        });

        new WOW().init();

        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type, // Jenis alert
                title: event.detail.title, // Judul pesan
                text: event.detail.text, // Isi pesan
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            });
        });
    </script>
    @stack('js')
</body>

</html>
