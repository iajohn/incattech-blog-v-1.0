<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">

        @yield('meta')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> @yield('title') | {{ config('app.name', 'Laravel') }} </title>

        <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
            <!-- Fontastic Custom icon font-->
            <link rel="stylesheet" href="{{ asset('themes/backend-theme/css/fontastic.css') }}">
            <!-- Google fonts - Roboto -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

        <!-- Compiled and minified CSS -->
            <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

        <!-- Styles -->
            <!-- <link href="{{ asset('themes/system-theme/css/app.css') }}" rel="stylesheet"> -->
            <link href="{{ asset('themes/system-theme/css/toastr.min.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('themes/backend-theme/vendor/bootstrap/css/bootstrap.min.css') }}">
            <!-- theme stylesheet-->
            <link rel="stylesheet" href="{{ asset('themes/backend-theme/css/style.pink.css') }}" id="theme-stylesheet">
            
            <!-- Custom stylesheet - for your changes-->
            <link rel="stylesheet" href="{{ asset('themes/backend-theme/css/custom.css') }}">

        <!--  SweetAlert2  -->
            <!-- // <script src="https://unpkg.com/sweetalert/dist/sweetalert2.min.js"></script> -->
            <link href="{{ asset('backend-theme/vendor/sweetalert/dist/sweetalert2.min.css') }}">

        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{ asset('themes/backend-theme/vendor/font-awesome/css/font-awesome.min.css') }}">
        
        <!-- jQuery Circle-->
        <link rel="stylesheet" href="{{ asset('themes/backend-theme/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
        
        <!-- Custom Scrollbar-->
        <link rel="stylesheet" href="{{ asset('themes/backend-theme/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

        <link rel="stylesheet" href="{{ asset('themes/backend-theme/vendor/datatables/css/dataTables.bootstrap.min.css') }}">
        
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('themes/system-theme/img/icon-black.png') }}">

        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        @yield('styles')
    </head>

    <body>  
        <!-- Side Navbar -->
        @include('partials.backend.global.sidebar')
        
        <div class="page">
            <!-- navbar -->
            @include('partials.backend.global.navbar')

            @yield('content')
          
            <!-- footer -->
            @include('partials.backend.global.footer')
        </div>

        <!-- // <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

        <!-- JavaScript files-->
        <!-- // <script src="{{ asset('themes/system-theme/js/app.js') }}"> </script> -->
        <script src="{{ asset('themes/system-theme/js/toastr.min.js') }}"> </script>

        <!-- // <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
        <script src="{{ asset('themes/backend-theme/vendor/jquery/jquery.min.js') }}"></script>
        
        <script src="{{ asset('themes/backend-theme/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        
        <!-- Compiled and minified JavaScript -->
        <!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

        <script src="{{ asset('themes/backend-theme/vendor/popper/umd/popper.js') }}"> </script>
        <script src="{{ asset('themes/backend-theme/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
        <script src="{{ asset('themes/backend-theme/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
        <script src="{{ asset('themes/backend-theme/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('themes/backend-theme/vendor/validator/validator.min.js') }}"></script>
        <script src="{{ asset('themes/backend-theme/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- // <script src="{{ asset('themes/backend-theme/js/charts-home.js') }}"></script> -->

        <script src="{{ asset('themes/backend-theme/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('themes/backend-theme/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        
        <script src="{{ asset('themes/backend-theme/vendor/validator/validator.min.js') }}"></script>
        <!-- Main File-->
        <script src="{{ asset('themes/backend-theme/js/front.js') }}"></script>        
        
        <script>

            @if(Session::has('success'))
                
                toastr.success("{{ Session::get('success') }}")
            
            @endif

            @if(Session::has('info'))
                
                toastr.info("{{ Session::get('info') }}")
            
            @endif
        </script>

        @yield('scripts')

    </body>
</html>

