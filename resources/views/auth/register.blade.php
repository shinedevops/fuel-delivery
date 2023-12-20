<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/login-register.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
</head>
<body>
    <main class="main login-page">
        <section class="page-login-section">
            <div class="login-section-wrapper">
                <div class="container">
                    <div class="login-wrapper">
                        <div class="login-logo-box">
                            <img src="{{ asset('assets/images/login-logo.svg')}}" alt="logo" class="login-logo">
                        </div>
                        <div class="login-box">
                            <div class="login-header text-center">
                                <h4>Sign Up</h4>
                                <p>Welcome to your personalized experience.</p>
                            </div>
                            <form class="login-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-box">
                                    <div class="upload-img pro-upload-bx">
                                        <div class="main-profile-image-box">
                                            <img src="{{ asset('assets/images/table-img1.png') }}" class="main-profile-image">
                                            <div class="file file--upload">
                                                <label for="input-file">
                                                    <i class="fa-solid fa-camera"></i>
                                                </label>
                                                <input id="input-file" type="file" name="profile_pic">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                                            <span class="form-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        @error('name')
                                        <span class="invalid-txt" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <span style="color: red" id="name-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email ID">
                                            <span class="form-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                        @error('email')
                                        <span class="invalid-txt" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <span style="color: red" id="email-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                                            <span class="form-icon">
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                        <span class="invalid-txt" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <span style="color: red" id="password-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            <span class="form-icon">
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                        <span class="invalid-txt" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <span style="color: red" id="password-confirm-msg"></span>
                                    </div>
                                </div>

                                <button type="submit" class="button primary-btn full-btn">Next</button>
                            </form>

                            <div class="login-footer-text">
                                <span>Already have an account?</span> <a href="{{ route('login') }}" class="login-footer-link">Log In</a>
                            </div>
                        </div>

                    </div>
                </div>
                <img src="{{ asset('assets/images/login-bg.png')}}" alt="" class="login-bg">
            </div>
        </section>

    </main>


    <!--JS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
        // Validation for name on input event
            $('#name').on('input', function() {
                var name = $(this).val().trim();
                var nameRegex = /^[a-zA-Z\s]+$/;
                var errorMsg = '';

                if (!name.match(nameRegex)) {
                    errorMsg = 'Name should contain only character.<br>';
                    $('#name-msg').html(errorMsg);
                } else {
                    $('#name-msg').html('');
                }
            });

            
            $('#email').on('input', function() {
                var email = $(this).val().trim();
                var emailRegex = /^[\w-\.]+@(?:gmail|outlook)\.com$/i;
                var errorMsg = '';

                if (!email.match(emailRegex)) {
                    errorMsg = 'Email end with @gmail.com or @outlook.com.<br>';
                    $('#email-msg').html(errorMsg);
                } else {
                    $('#email-msg').html('');
                }
            });


            
            $('#password').on('input', function() {
                var password = $(this).val().trim();
                var passwordRegex = /^[a-zA-Z]+$/;
                var errorMsg = '';

                if (password.length < 4) {
                    errorMsg = ' at least 4 digites.<br>';
                    $('#password-msg').html(errorMsg);
                } 
                // else if (!password.match(passwordRegex)) {
                //     errorMsg = 'Password should contain only letters.<br>';
                //     $('#password-msg').html(errorMsg);
                // } 
                else {
                    $('#password-msg').html('');
                }
            });

            
            $('#password-confirm').on('input', function() {
                var password = $('#password').val().trim();
                var confirmPassword = $(this).val().trim();
                var errorMsg = '';

                if (password !== confirmPassword) {
                    errorMsg = 'Passwords do not match.<br>';
                    $('#password-confirm-msg').html(errorMsg);
                } else {
                    $('#password-confirm-msg').html('');
                }
            });

        });

    </script>


</body>

</html>
