<div class="table tabs-item {{ $status ?? '' }}">
    <div class="cd-filter-block mb-0">

        <div class="cd-filter-content">
            <form action="{{ route('login') }}" method="post" class="comments-form">
                @csrf
                <div class="row">

                    <div class="col-md-12">
                        <label><i class="fas fa-envelope"></i></label>
                        <input class="@error('email') is-invalid @enderror @error('username') is-invalid @enderror" type="text" name="credentials" value="{{ old('credentials') }}" placeholder="{{ __('master.Enter email or username') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label><i class="fas fa-lock"></i></label>
                        <input class="@error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" placeholder="{{ __('master.password') }}" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-5">
                        <button type="submit" value="login" id="login" class="btn btn-default-yellow-fill mt-0 mb-3 mr-3">
                            {{ __('master.login') }} <i class="fas fa-lock"></i>
                        </button>

                        @if (Route::has('password.request'))
                            <a class="golink mr-3" href="{{ route('password.request') }}">
                                {{ __('master.Forgot Your Password?') }}
                            </a>
                        @endif

                        <ul class="list d-inline">
                            <li>
                                <input name="remember" type="checkbox" id="checkbox" class="filter" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox" class="checkbox-label c-grey" >{{ __('master.Remember Me') }}</label>
                            </li>
                        </ul>

                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
