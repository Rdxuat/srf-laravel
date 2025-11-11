<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SRF Digital Annual Report 2024–25 | SRF Limited – Sustainability, Performance & Governance</title>
  <meta name="description" content="">
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="images/" />

  {{-- CSS --}}
  <link rel="stylesheet" href="https://use.typekit.net/czb8wkt.css">
  <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

  @stack('styles')
</head>

<body @hasSection('body-attributes') @yield('body-attributes') @endif>

  @include('layout.header')
  <div id="wrapper">
    @yield('content')
    @include('layout.footer')
  </div>

  {{-- JS --}}
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.counterup.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}" defer></script>
  <script src="{{ asset('assets/js/custom.js') }}" defer></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
  <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
  <script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script>
    jQuery(document).ready(function ($) {
      $('.counter').counterUp({ delay: 10, time: 1500 });
    });
    new WOW().init();
  </script>

  <script>
    $(document).ready(function () {
      $('.nav-icon3').click(function () {
        $(this).toggleClass('open');
      });
      $(".mega-dropdown a").click(function () {
        $(".nav-icon3").removeClass("open");
      });
    });
  </script>

  @stack('scripts')
</body>

</html>