<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login-register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


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
                        @yield('formcontent')
                    </div>

                </div>
                <img src="{{ asset('assets/images/login-bg.png') }}" alt="" class="login-bg">
            </div>
        </section>

    </main>


    <!--JS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    {{-- phone Validation --}}
    {{-- <script>
        $(document).ready(function() {
            $('#phone_number').on('input', function() {
                var phoneNumber = $(this).val().trim();
                var phoneRegex = /^\d{10,}$/;

                if (!phoneNumber.match(phoneRegex)) {
                    var errorMsg = 'Phone number should contain at least 10 digits.';
                    $('#phone-msg').html(errorMsg);
                } else {
                    $('#phone-msg').html('');
                }
            });
        });
    </script> --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            var form = jQuery('#registerform');
            form.validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        regex: /^[a-zA-Z]+[a-zA-Z]+$/,
                    },
                    email: {
                        required: true,
                        regex: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    },
                    // phone_number: {
                    //     required: true,
                    //     regex: /^[(]?[0-9]{3}[)]?[-]?[0-9]{3}[-]?[0-9]{4}$/
                    // },
                    // title: {
                    //     minlength: 3,
                    //     maxlength: 50,
                    //     regex: /^[a-zA-Z]+[a-zA-Z\s]+$/,
                    // },
                    // company: {
                    //     minlength: 3,
                    //     maxlength: 80,
                    //     regex: /^[a-zA-Z]+[a-zA-Z\s]+$/,
                    // },
                    password: {
                        required: true,
                        minlength: 8, // Minimum password length
                    },
                    password-confirm: {
                        required: true,
                        equalTo: '#password', // Ensure the confirmation matches the password
                    },
                },
                messages: {
                    name: {
                        required: 'Name is required',
                        minlength: 'Name must be 3-50 characters long',
                        maxlength: 'Name must be 3-50 characters long',
                        regex: 'Name contains alphabets only',
                    },
                    email: {
                        required: 'Email is required',
                        regex: 'Invalid email address',
                    },
                    // phone_number: {
                    //     required: 'Please enter the phone number',
                    //     regex: "Invalid phone number"
                    // },
                    title: {
                        minlength: 'Title must be 3-50 characters long',
                        maxlength: 'Title must be 3-50 characters long',
                        regex: 'Title contains alphabets and space only',
                    },
                    // company: {
                    //     minlength: 'Company must be 3-80 characters long',
                    //     maxlength: 'Company must be 3-80 characters long',
                    //     regex: 'Company contains alphabets and space only',
                    // },
                    password: {
                        required: 'Password is required',
                        minlength: 'Password must be at least 8 characters long',
                    },
                    password-confirm: {
                        required: 'Please confirm your password',
                        equalTo: 'Passwords do not match',
                    },
                },
            });

            form.on('keyup change', function() {
                var valid = form.valid(); // Check if the form is valid
                if (valid) {
                    jQuery('.button.primary-btn.full-btn').prop('disabled', false); // Enable the button
                } else {
                    jQuery('.button.primary-btn.full-btn').prop('disabled', true); // Disable the button
                }
            });
        });
    </script>



</body>

</html>
