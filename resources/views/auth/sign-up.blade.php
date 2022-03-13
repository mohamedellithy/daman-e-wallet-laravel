<div class="table tabs-item {{ $status ?? '' }}">
    <div class="cd-filter-block mb-0">
        <div class="cd-filter-content">
            <form method="POST" action="{{ route('register') }}" name="orderfrm" class="comments-form">
                @csrf
                <div class="row mb-5">
                    <div class="col-md-6">
                        <label for="firstname"><i class="fas fa-user-tie"></i></label>
                        <input class="@error('firstname') is-invalid @enderror" type="text"  id="firstname" placeholder="{{ __('master.first_name') }}" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputLastName"><i class="fas fa-user-tie"></i></label>
                        <input class="@error('lastname') is-invalid @enderror" type="text"  id="inputLastName" placeholder="{{ __('master.last_name') }}" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="inputusername"><i class="fas fa-user-tie"></i></label>
                        <input class="@error('username') is-invalid @enderror" type="text"  id="inputusername" placeholder="{{ __('master.username') }}" name="username" value="{{ old('username') }}" required autocomplete="username">
                       @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone"><i class="fas fa-phone"></i></label>
                        <input class="@error('phone') is-invalid @enderror" type="tel"  id="inputPhone" placeholder="{{ __('master.phone') }}" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress1"><i class="far fa-building"></i></label>
                        <input class="@error('country') is-invalid @enderror" type="text"  id="inputAddress1" placeholder="{{ __('master.country') }}" name="country" value="{{ old('country') }}" required autocomplete="country">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 ">
                        <label for="inputEmail"><i class="fas fa-envelope"></i></label>
                        <input class="@error('email') is-invalid @enderror" type="email"  id="inputEmail" placeholder="{{ __('master.email') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                     <div class="col-md-6">
                        <label for="inputNewPassword1"><i class="fas fa-lock"></i></label>
                        <input class="@error('password') is-invalid @enderror" type="password"  id="inputNewPassword1" placeholder="{{ __('master.password') }}" name="password" value="{{ old('password') }}" required autocomplete="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputNewPassword2"><i class="fas fa-lock"></i></label>
                        <input class="@error('password_confirmation') is-invalid @enderror" type="password"  id="inputNewPassword2" placeholder="{{ __('master.password_confirmation') }}"  name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                
                <button type="submit" value="Submit" class="btn btn-default-yellow-fill mb-1 disable-on-click spinner-on-click ">{{ __('master.register') }}</button>
                <a href="{{ route('login') }}" class="golink mr-3">
                    {{ __('master.are you have account already?') }}
                </a>
            </form>
        </div>
    </div>
</div>