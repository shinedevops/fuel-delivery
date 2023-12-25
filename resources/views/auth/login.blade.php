@extends('layouts.formlayout')
@section('title','login')
{{-- {{'login'}}
@endsection --}}
@section('formcontent')
    <div class="container">
        <div class="login-wrapper">
            
            <div class="login-box">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="login-header text-center">
                    <h4>Login</h4>
                    <p>Welcome to your personalized experience.</p>
                </div>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="input-box">
                        <div class="form-group">
                            <div class="formfield">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter email address" value="{{ old('email') }}" >
                                <span class="form-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                            </div>
                            @error('email')
                                <span class="invalid-txt">{{ $message }}</span>
                            @enderror
                            {{-- <span style="color: red" id="email-msg"></span> --}}
                        </div>
                        <div class="form-group">
                            <div class="formfield">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Enter Password" >
                                <span class="form-icon">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-txt">{{ $message }}</span>
                            @enderror
                            {{-- <span style="color: red" id="password-msg"></span> --}}
                        </div>

                    </div>
                    <div class="login-checkbox-form-group">
                        <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember
                            me</label>
                        <a href="{{ route('password.request') }}" class="forget-password-btn">Forgot password?</a>
                    </div>
                    <button type="submit" class="button primary-btn full-btn">Login</button>
                </form>

                <div class="login-footer-text">
                    <span>Don’t have an account?</span> <a href="{{ route('register') }}" class="login-footer-link">Sign
                        Up</a>
                </div>
            </div>
            <div class="login-icon-wrapper">
                <div class="login-icon-box">
                    <img src="{{ asset('assets/images/login-icon1.svg') }}" alt="">
                    <p><span>100 %</span> assured
                        Quality & Quantity</p>
                </div>
                <div class="login-icon-box login-middle">
                    <img src="{{ asset('assets/images/login-icon2.svg') }}" alt="">
                    <p><span>theft-proof</span>
                        advanced delivery mediums</p>
                </div>
                <div class="login-icon-box">
                    <img src="{{ asset('assets/images/login-icon3.svg') }}" alt="">
                    <p>Pan <span>USA</span> Delivery
                        Network</p>
                </div>
            </div>
        </div>
    </div>
@endsection
