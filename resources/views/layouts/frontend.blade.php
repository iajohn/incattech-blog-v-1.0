<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <!-- @if(!empty($meta_description)) <meta name="description" content="{{ $meta_description }}"> @endif
        
        @if(!empty($meta_author)) <meta name="author" content="{{ $meta_author }}"> @endif

        @if(!empty($meta_keyword)) <meta name="keyword" content="{{ $meta_keyword }}"> @endif -->

        @yield('meta')
        <!-- Shareable -->
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:type"  content="{{ $title }}" />
        <meta property="og:url"   content="{{ url('/') }}" />
        <meta property="og:image" content=" " />
        
        <title> @if(!empty($meta_title)) {{ $meta_title }} @else {{ $title }} | {{ $settings->site_name }} @endif </title>

        <!-- Toastr -->
        <link href="{{ asset('themes/system-theme/css/toastr.min.css') }}" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/scripts/bootstrap/bootstrap.min.css') }}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/scripts/ionicons/css/ionicons.min.css') }}">
        <!-- Toast -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/scripts/toast/jquery.toast.min.css') }}">
        <!-- OwlCarousel -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/scripts/magnific-popup/dist/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/scripts/sweetalert/dist/sweetalert.css') }}">
        
        <!-- Custom style -->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/skins/all.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/demo.css') }}">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('themes/frontend-theme/css/custom.css') }}">

        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('themes/system-theme/img/icon-black.png') }}">

        @yield('styles')

        <script type="text/javascript"> //<![CDATA[ 
            // var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
            // document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
            // //]]>
        </script>

    </head>
    
    <body class="skin-orange">

        @include('partials.frontend.global.header')

        @yield('content')

        @include('partials.frontend.global.footer')
        
        <!-- Back to top -->
        <div id="back-to-top"></div>
        <!-- Back to top -->
        
        

        <!-- =======================================================================================
            JavaScript Files
        ======================================================================================== -->
        <script>
            @if(Session::has('subscribed'))
                
                toastr.success("{{ Session::get('subscribed') }}")
            
            @endif
        </script>
        
        <script src="{{ asset('themes/system-theme/js/toastr.min.js') }}"> </script>
        <script src="{{ asset('themes/frontend-theme/js/jquery.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/js/jquery.migrate.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/bootstrap/bootstrap.min.js') }}"></script>
        <script>var $target_end=$(".best-of-the-week");</script>
        <script src="{{ asset('themes/frontend-theme/scripts/jquery-number/jquery.number.min.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/easescroll/jquery.easeScroll.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/scripts/toast/jquery.toast.min.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/js/demo.js') }}"></script>
        <script src="{{ asset('themes/frontend-theme/js/e-magz.js') }}"></script>
        <script src="{{ asset('frontend-theme/js/main.js') }}"></script>        
        <script type="text/javascript">
            (function($) {
                $(window).on('scroll', function() {
                    // Fixed Nav
                    var wScroll = $(this).scrollTop();
                    wScroll > $('header').height() ? $('#nav-header').addClass('fixed') : $('#nav-header').removeClass('fixed');
                    
                    // Back to top appear
                    wScroll > 740 ? $('#back-to-top').addClass('active') : $('#back-to-top').removeClass('active')
                });
                
                // Back to top
                $('#back-to-top').on("click", function(){
                    $('body,html').animate({
                        scrollTop: 0
                    }, 500);
                });
            });
        </script>

        @yield('scripts')

        <script language="JavaScript" type="text/javascript">
            // TrustLogo("https://www.incattech.com", "CL1", "none");
        </script>
        <!-- <a  href="https://www.positivessl.com/" id="comodoTL">Positive SSL</a> -->

    </body>
</html>
