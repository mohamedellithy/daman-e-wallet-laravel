<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home</title>
    <meta name="description" content="">
    <link href="{{asset('template/img/favicon.ico') }}" rel="shortcut icon">
    <!-- Fonts -->
    <link href="{{ asset('template/fonts/fontawesome/css/all.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/fonts/cloudicon/cloudicon.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/fonts/opensans/opensans.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <!-- CSS styles -->
    <link href="{{ asset('template/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <!-- CSS styles -->
    <link href="{{ asset('template/css/owl.carousel.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/css/swiper.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/css/animate.min.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/css/style-rtl.min.css') }}" rel="stylesheet">


    <!-- Custom color styles -->
    <link href="{{ asset('template/css/colors/pink.css') }}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{ asset('template/css/colors/blue.css') }}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{ asset('template/css/colors/green.css') }}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>
  </head>
  <body>
 <!-- ***** UPLOADED MENU FROM HEADER.HTML ***** -->
  <header id="header"> </header>
  <!-- ***** SLIDER ***** -->
  <section id="owl-demo" class="owl-carousel owl-theme owl-loaded owl-drag">
    <div class="full h-100 total-grad-pink-blue-intense">
      <div class="vc-parent">
        <div class="vc-child">
          <div class="top-banner">
            <div class="container">
              <img class="svg custom-element-right" src="{{ asset('template/patterns/dedicatedserver3d.svg') }}" alt="Dedicated Server">
              <div class="heading">E-wallet Payment <div class="animatype">With <span id="typed3"></span></div></div>
              <h3 class="subheading">Powerful servers with high-end resources <br>that will guarantee resource exclusivity, <br> <b class="c-pink">send Payments Now</b><br>
              </h3>
              <a href="{{ route('login') }}" class="btn btn-default-yellow-fill mr-3">Login Now </a>
              <a href="{{ route('register') }}" class="btn btn-default-pink-fill">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="full h-100 total-grad-pink-blue-intense">
      <div class="vc-parent">
        <div class="vc-child">
          <div class="top-banner">
            <div class="container">
              <img class="svg custom-element-right" src="{{ asset('template/patterns/cloud3d.svg') }}" alt="Cloud VPS Server">
              <h1 class="heading">E-wallet Payment <br>Services </h1>
              <h3 class="subheading">
                <i class="c-pink feat fas fa-check-circle mr-2"></i> Immediate scalability<br>
                <i class="c-pink feat fas fa-check-circle mr-2"></i> High performance<br>
                <i class="c-pink feat fas fa-check-circle mr-2"></i> Fast deployment
              </h3>
              <a href="{{ route('login') }}" class="btn btn-default-yellow-fill mr-3">Login Now </a>
              <a href="{{ route('register') }}" class="btn btn-default-pink-fill">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Javascript -->
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <!-- Javascript -->
    <script src="{{ asset('template/js/typed.js') }}"></script>
    <script defer src="{{ asset('template/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.countdown.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script defer src="{{ asset('template/js/slick.min.js') }}"></script>
    <script defer src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('template/js/isotope.min.js') }}"></script>
    <script defer src="{{ asset('template/js/swiper.min.js') }}"></script>
    <script async src="{{ asset('template/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('template/js/wow.min.js') }}"></script>
    <script>new WOW().init();</script>
    <script defer src="{{ asset('template/js/scripts.min.js') }}"></script>
    <script>
    var typed3 = new Typed('#typed3', {
    strings: ["Premium hardware.", "Large performance.", "Fully dedicated."],
    typeSpeed: 50,
    backSpeed: 20,
    smartBackspace: true,
    loop: true
    });
    </script>
    <script  src="{{ asset('js/app.js') }}"></script>
    </body>
  </html>
