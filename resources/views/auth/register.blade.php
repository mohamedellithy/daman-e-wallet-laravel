@extends('auth.master')
@section('header')

@endsection
@section('form_auth')

        <div class="randomline">
            <div class="bigline"></div>
            <div class="smallline"></div>
        </div>
        <h3>{{ __('master.login_or_create_account') }}</h3>
        <p class="mb-5">{{ __('master.login_register_description') }}</p>
        <div class="tabs-header">
            <ul class="btn-group">
                <li class="btn btn-secondary {{ $type == 'signIn'?'active':'' }} mb-2">
                    <a href="{{ route('login') }}"> {{ __('master.login') }}</a>
                </li>
                <li class="btn btn-secondary {{ $type == 'signUp'?'active':'' }}">
                    <a href="{{ route('register') }}"> {{ __('master.register') }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-sm-6">
                @include('auth.sign-in',['status'=>($type == 'signIn'?'active':'')])
                @include('auth.sign-up',['status'=>($type == 'signUp'?'active':'')])
            </div>
            <div class="col-sm-6">
                <img class="img-responsive" src="{{ asset('template/img/e-wallet.jpg') }}" />
            </div>
        </div>


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
