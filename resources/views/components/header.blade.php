<header class="header">

    <!-- ***** NEWS ***** -->
    <div class="sec-bg3 p-2 pr-3 infonews">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-6 news">
                <h6 class="m-0">
                <small class="text-light">Gaming Servers Page Already Available. <a class="c-yellow opa-8" href="gaming">See Live Demo <i class="fas fa-arrow-circle-right"></i></a></small>
                </h6>
            </div>
            <div class="col-md-6 link">
                <li class="infonews-nav float-right">
                <a href="blog">Blog</a>
                <a href="contact">Support</span></a>
                <a href="login">myAntler</a>
                <a href="#"><b>+ (123) 1300-656-1046</b></a>
                </li>
            </div>
            </div>
        </div>
    </div>

    <!-- ***** NAV MENU ****** -->
    <div class="menu-wrap">
        <div class="nav-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 col-md-2">
                        <a href="index">
                            <img class="svg logo-menu" src="{{ asset('template/img/logo.svg') }}" alt="logo Antler">
                        </a>
                    </div>
                    <nav id="menu" class="col-10 col-md-10">
                        <div class="navigation float-right">
                            <button class="menu-toggle">
                                <span class="icon"></span>
                                <span class="icon"></span>
                                <span class="icon"></span>
                            </button>
                            <ul class="main-menu nav navbar-nav navbar-right">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                                @guest
                                    <li class="menu-item menu-item-has-children" >
                                        <a class="pr-0 mr-0" href="{{ route('login') }}" > <div class="btn btn-default-yellow-fill question" data-i18n="[html]header.login"><i class="fas fa-lock pr-1"></i> {{__('master.login')}} </div></a>
                                    </li>
                                    <li class="menu-item menu-item-has-children" >
                                        <a class="pr-0 mr-0" href="{{ route('register') }}"> <div class="btn btn-default-yellow-fill question" data-i18n="[html]header.login"><i class="fas fa-lock pr-1"></i> {{ __('master.register') }} </div></a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="menu-item menu-item-has-children" >
                                        <a class="pr-0 mr-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#"> <div class="btn btn-default-yellow-fill question" data-i18n="[html]header.login"><i class="fas fa-lock pr-1"></i> {{ Auth::user()->username  }}  </div></a>
                                    </li>
                                @endauth

                                <li class="menu-item menu-item-has-children">
                                    <a class="v-stroke {{ $active == 'tickets' ? 'v-active':'' }} " href="{{ url('tickets') }}" > {{ __('master.open Ticket') }}</a>
                                </li>

                                <li class="menu-item menu-item-has-children menu-last">
                                    <a class="v-stroke {{ $active == 'withdraws' ? 'v-active':'' }}" href="{{ route('withdraws.index') }}"> {{__('master.withdraws')}} </a>
                                </li>

                                <li class="menu-item menu-item-has-children menu-last">
                                    <a class="v-stroke {{ $active == 'charge-wallet' ? 'v-active':'' }}" href="{{ route('charge-wallets.index') }}"> {{__('master.Charge Wallet') }} </a>
                                </li>

                                <li class="menu-item menu-item-has-children">
                                    <a class="v-stroke {{ $active == 'payments' ? 'v-active':'' }}" href="{{ route('payments.create') }}" > {{__('master.Create Payment') }}</a>
                                </li>

                                <li class="menu-item menu-item-has-children">
                                    <a class="v-stroke {{ $active == 'wallets' ? 'v-active':'' }}" href="{{ url('wallets') }}" data-i18n="[html]header.pages"> {{__('master.Payment Requests')}}</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** NAV MENU MOBILE ****** -->
    <div class="menu-wrap mobile">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <a href="index">     
                        <img class="svg logo-menu" src="{{ asset('template/img/logo.svg') }}" alt="logo Antler">
                    </a>
                </div>
                <div class="col-6">
                    <nav class="nav-menu">
                        <button id="nav-toggle" class="menu-toggle">
                            <span class="icon"></span>
                            <span class="icon"></span>
                            <span class="icon"></span>
                        </button>
                        <ul class="main-menu">
                            <div class="menu-item">
                                <a  class="v-stroke {{ $active == 'withdraws' ? 'v-active':'' }} " href="{{ route('withdraws.index') }}" > withdraws</a>
                            </div>
                            <div class="menu-item">
                                <a class="v-stroke {{ $active == 'payments' ? 'v-active':'' }} " href="{{ route('payments.create') }}" > Create Payment</a>
                            </div>
                            <div class="menu-item">
                                <a class="v-stroke {{ $active == 'tickets' ? 'v-active':'' }} " href="{{ url('tickets') }}" > Tickets Support</a>
                            </div>
                            <div class="menu-item menu-last">
                                <a class="v-stroke {{ $active == 'wallets' ? 'v-active':'' }} " href="{{ url('wallets') }}" > Payment Request</a>
                            </div>
                            <div class="float-left w-100 mt-3">
                                <p class="c-grey"> <small> Phone: + (123) 1300-656-1046</small> </p>
                                <p class="c-grey"><small>Email: antler@mail.com</small> </p>
                            </div>
                            <div>
                                <a href="login" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="btn btn-default-yellow-fill mt-3">Logout Account</div>
                                </a>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** TRANSLATION ****** -->
    <section id="drop-lng" class="btn-group btn-group-toggle toplang">
        <label class="btn btn-secondary mb-2 lang  {{ app()->getLocale() == 'ar' ? 'seletedLang':'' }}">
            <a href="{{ url('switch/ar') }}" name="options" id="option1" style="line-height: 12px;" > <img style="width: 20px;" src="https://cdn.britannica.com/79/5779-004-DC479508/Flag-Saudi-Arabia.jpg" class="flage-image"/> {{__('master.ar') }} </a>
        </label>
        <label  class="btn btn-secondary lang {{ app()->getLocale() == 'fr' ? 'seletedLang':'' }}">
            <a href="{{ url('switch/fr') }}" name="options" id="option2" style="line-height: 12px;"> <img style="width: 20px;" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1200px-Flag_of_France.svg.png" class="flage-image"/> {{__('master.fr') }} </a>
        </label>
    </section>
</header>
