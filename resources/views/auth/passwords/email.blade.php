{{-- @include('layouts.app') --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login-register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <main class="main login-page">
        <section class="page-login-section">
            <div class="login-section-wrapper">
                <div class="container">
                    <div class="login-wrapper">
                        <div class="login-logo-box">
                            <img src="{{ asset('assets/images/login-logo.svg') }}" alt="logo" class="login-logo">
                        </div>
                        <div class="login-box">
                            <div class="login-header text-center">
                                <h4>Reset Password</h4>
                                <p>Welcome to your personalized experience.</p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="input-box">
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Enter email address" value="{{ old('email') }}">
                                            <span class="form-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        @error('email')
                                            <span class="invalid-txt">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button primary-btn full-btn">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                        {{-- <span class="form-icon">
                                                <i class="fa-solid fa-lock"></i>
                                            </span> --}}
                                        @error('password')
                                            <span class="invalid-txt">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div> --}}
                                </div>
                            </form>
                            <div class="login-footer-text">
                                <span>Already have an account?</span> <a href="{{ route('login') }}"
                                    class="login-footer-link">Log In</a>
                            </div>
                            {{-- <div class="login-footer-text">
                                <span>Don’t have an account?</span> <a href="{{ route('register') }}"
                                    class="login-footer-link">Sign Up</a>
                            </div> --}}
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
                <img src="{{ asset('assets/images/login-bg.png') }}" alt="" class="login-bg">
            </div>
        </section>

    </main>


    <!--JS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

</body>

</html>
