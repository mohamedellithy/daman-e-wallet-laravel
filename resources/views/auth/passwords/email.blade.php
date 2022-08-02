@extends('auth.master')
@section('header')

@endsection
@section('form_auth')
    <div class="row">
        <div class="col-sm-6 content-password">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h4 class="heading-password">{{ __('master.reset_password') }}</h4>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group row">
                    <label for="phone" class="col-md-12 col-form-label text-md-right email-password">{{ __('master.phone') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12" style="text-align: left;">
                        <button type="submit" class="btn btn-primary btn-submit-form">
                            {{ __('master.Send_Password_Reset_Link') }}
                        </button>
                    </div>
                </div>
            </form>
                
        </div>
        <div class="col-sm-6">
            <img class="img-responsive" src="{{ asset('template/img/forgot.jpg') }}" />
        </div>
    </div>
@endsection
