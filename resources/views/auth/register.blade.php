@extends('layouts.formlayout')
@section('title', 'sign up')
{{-- {{'login'}}
@endsection --}}
@section('formcontent')
    <!-- Your HTML form content -->
    <!-- ... -->
    <div class="login-box">
        <div class="login-header text-center">
            <h4>Sign Up</h4>
            <p>Welcome to your personalized experience.</p>
        </div>
        <form class="login-form" id="registerform" name="registerform" method="POST" action="{{ route('register') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <div class="upload-img pro-upload-bx">
                    <div class="main-profile-image-box">
                        <img src="{{ asset('assets/images/table-img1.png') }}" class="main-profile-image"  alt="profile">

                        <div class="file file--upload">
                            <label for="input-file">
                                <i class="fa-solid fa-camera"></i>
                            </label>
                            {{-- <input id="input-file" type="file" name="profile"> --}}
                            <input id="input-file" type="file"  name="profile" placeholder="Choose image" 
                            value="" alt="profile" hidden >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="formfield">
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Full Name">
                        <span class="form-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                    </div>
                    @error('name')
                        <span class="invalid-txt" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    {{-- <span style="color: red" id="name-msg"></span> --}}
                </div>

                <div class="form-group">
                    <div class="formfield">
                        <input id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email" placeholder="Email ID">
                        <span class="form-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                    </div>
                    @error('email')
                        <span class="invalid-txt" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    {{-- <span style="color: red" id="email-msg"></span> --}}
                </div>
                <div class="form-group">
                    <div class="formfield">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="new-password" placeholder="Enter Password">
                        <span class="form-icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-txt" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    {{-- <span style="color: red" id="password-msg"></span> --}}
                </div>
                <div class="form-group">
                    <div class="formfield">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Confirm Password">
                        <span class="form-icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <span class="invalid-txt" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    {{-- <span style="color: red" id="password_confirmation-msg"></span> --}}
                </div>
            </div>

            <button type="submit" class="button primary-btn full-btn">Next</button>
        </form>

        <div class="login-footer-text">
            <span>Already have an account?</span> <a href="{{ route('login') }}" class="login-footer-link">Log In</a>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $("#registerform").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        pattern: /^[a-zA-Z]+(?: [a-zA-Z]+)*$/

                    },
                    email: {
                        required: true,
                        pattern: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    },
                    password: {
                        required: true,
                        minlength: 4,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: '#password',
                    },
                },
                messages: {
                    // Error messages for each field...
                    name: {
                        required: 'Name is required',
                        minlength: 'Name must be 3-50 characters long',
                        maxlength: 'Name must be 3-50 characters long',
                        pattern: 'Name contains alphabets only & space',
                    },
                    email: {
                        required: 'Email is required',
                        pattern: 'Invalid email address',
                    },
                    password: {
                        required: 'Password is required',
                        minlength: 'Password must be at least 4 characters long',
                    },
                    password_confirmation: {
                        required: 'Please confirm your password',
                        equalTo: 'Passwords do not match',
                    },
                }
            });

            // Click event handler for the "Next" button
            $('.button.primary-btn.full-btn').on('click', function(e) {
                e.preventDefault();
                if ($('#registerform').valid()) {
                    $('#registerform').submit();
                }
            });
        });
    </script>
@stop
