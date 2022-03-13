@extends('master')

@section('pre_style')
    <link href="{{ asset('template/css/magnific-popup.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
@endsection


@section('content')
    <!-- ***** STATISTICS ***** -->
    <section class="circle-section shopping blog sec-normal sec-bg2 ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 text-left">
                    <h2 class="section-heading">{{ __('master.are_you_have_payment') }}</h2>
                    <p class="section-subheading">{{ __('master.description_are_have_payments') }}</p>
                    <a href="{{ route('payments.create') }}" class="btn btn-default-yellow-fill mt-5">{{ __('master.request_pyamnets_now') }}</a>
                </div>
                <x-show-statics></x-show-statics>

                <router-view></router-view>

            </div>
        </div>
    </section>
@endsection


@section('pre_script')
    <script defer src="{{ asset('template/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('template/js/variables.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.circliful.min.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.viewportchecker.min.js') }}"></script>
@endsection
