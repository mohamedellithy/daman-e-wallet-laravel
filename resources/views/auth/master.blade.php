@extends('master')
@section('header')

@endsection
@section('content')
    <section class="fullrock-content">
        <div class="container">
            <a href="index"><img class="svg logo-menu" src="{{ asset('template/img/logo-light.svg') }}" alt="logo Antler"></a>
            <div class="sec-main sec-bg1 tabs mb-100">
                @yield('form_auth')
            </div>
        </div>
    </section>
@endsection

@section('custom_style')
<style>
    .fullrock-content {
        transform: translate(-50%, 3%) !important;
    }
    .fullrock-content h3{
        font-size: 19px;
        line-height: 2em;
    }
    .tabs-header .btn-secondary{
        font-size: 10px !important;
    }
</style>
@endsection