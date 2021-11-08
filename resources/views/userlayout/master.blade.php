     <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Prepare For Japan</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="{{ url('images/logo/logo-1.png') }}" rel="icon">
      <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

      <!-- =======================================================
      * Template Name: Tempo - v2.2.1
      * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
      * Author: BootstrapMade.com
      * License: https://bootstrapmade.com/license/
      ======================================================== -->
    </head>

    <body>

      <!-- ======= Header ======= -->

      <header id="header" class="fixed-top header-inner-pages">
        @if (session('active')==true)
            @if (session('status')==1)
            <div style="background:rgb(82, 43, 43); color:white; text-align: center;">Your Channel si not created Please Create youre Channel First <a href="{{ url('/channelcreate') }}">Create</a> </div>
            @endif
        @endif
        <div class="container d-flex align-items-center">


          <h1 class="logo mr-auto"><a href="{{ url('/') }}"><img src="{{ url('images/logo/logo.png') }}" alt=""></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->


          @include('userlayout.header')
        </div>
      </header>

      @yield('content')





      @include('userlayout.footer')
      {{-- <script>
        $(document).ready(function() {
          $("#txtEditor").Editor();
        });
      </script> --}}
      <!-- Vendor JS Files -->
      <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
      <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

      <!-- Template Main JS File -->
      <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>

    </html>
