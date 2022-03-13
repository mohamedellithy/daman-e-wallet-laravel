<!DOCTYPE html>
<html dir="{{ Dir_Theme }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
    <meta name="description" content="">
    <link href="{{asset('template/img/favicon.ico') }}" rel="shortcut icon">
    @yield('pre_style')
    <!-- Fonts -->
    <link href="{{ asset('template/fonts/fontawesome/css/all.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/fonts/cloudicon/cloudicon.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <link href="{{ asset('template/fonts/opensans/opensans.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <!-- CSS styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/filter-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/custom.css') }}" rel="stylesheet">

    @if(Dir_Theme == 'ltr')
        <link href="{{ asset('template/css/style-ltr.css') }}" rel="stylesheet">
    @endif

    <!-- custom styles -->
    @yield('custom_style')
    <!-- custom styles -->

    <!-- Custom color styles -->
    <link href="{{ asset('template/css/colors/pink.css') }}" rel="stylesheet" title="pink" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{ asset('template/css/colors/blue.css') }}" rel="stylesheet" title="blue" media="none" onload="if(media!='all')media='all'"/>
    <link href="{{ asset('template/css/colors/green.css') }}" rel="stylesheet" title="green" media="none" onload="if(media!='all')media='all'"/>
  </head>
  <body>
    <!-- ***** LOADING PAGE ****** -->
    <div id="spinner-area">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
        <div class="spinner-txt">Antler...</div>
      </div>
    </div>
    <p id="nav-toggle"></p>

    <!-- ***** FULL COUNTDOWN PAGE ***** -->
    <div class="fullrock config sec-bg2 " id="app">

      @yield('header',view('components.header',['active'=>($menu_active ?? 'Page')]))


      @yield('content')
      <section class="services help">
          <div class="container">
              <div class="service-wrap">
                  <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="help-container">
                        <a href="{{ 'https://wa.me/+'.Option('whatsapp_number') }}" target="_blank" class="help-item">
                            <div class="img">
                                <img class="svg ico" src="{{ asset('template/fonts/svg/phone.svg')}}" height="65" alt="">
                            </div>
                            <div class="inform">
                                <div class="title">{{__('master.Whatsapp Contact') }}</div>
                                <div class="description">{{ __('master.whatsapp_description',['phone'=>Option('whatsapp_number')]) }}</div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="help-container">
                        <a href="{{ url('tickets') }}" class="help-item">
                            <div class="img">
                                <img class="svg ico" src="{{ asset('template/fonts/svg/emailopen.svg')}}" height="65" alt="">
                            </div>
                            <div class="inform">
                                <div class="title">{{ __('master.open Ticket') }}</div>
                                <div class="description">{{ __('master.ticket_description') }}</div>
                            </div>
                        </a>
                        </div>
                    </div>

                  </div>
              </div>
          </div>
      </section>
    </div>


    <!-- Javascript -->
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script defer src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    @yield('pre_script')
    <script defer src="{{ asset('template/js/jquery.countdown.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script defer src="{{ asset('template/js/slick.min.js') }}"></script>
    <script defer src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script defer src="{{ asset('template/js/isotope.min.js') }}"></script>
    <script defer src="{{ asset('template/js/filter.js') }}"></script>
    <script defer src="{{ asset('template/js/swiper.min.js') }}"></script>
    <script defer src="{{ asset('template/js/scripts.js') }}"></script>


    <!-- custom scripts -->
      @yield('custom_script')
    <!-- custom scripts -->
    <script>
        window.default_locale = "{{ config('app.lang') }}";
        window.fallback_locale = "{{ config('app.fallback_locale') }}";
    </script>

    <script  src="{{ asset('js/app.js') }}"></script>
    
    </body>
  </html>
