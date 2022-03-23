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
        <div class="tabs-header btn-select-customer">
            <ul class="btn-group btn-group-toggle" data-toggle="buttons">
                <li class="btn btn-secondary {{ $type == 'signIn'?'active':'' }} mb-2">
                    <input type="radio" name="options" id="option1" checked> {{ __('master.login') }}
                </li>
                <li class="btn btn-secondary {{ $type == 'signUp'?'active':'' }}">
                    <input type="radio" name="options" id="option2"> {{ __('master.register') }}
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