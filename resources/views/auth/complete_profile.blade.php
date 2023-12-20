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
                                <h4>Complete Your Profile</h4>
                            </div>
                                <form class="login-form" action="{{ route('store.userDetails') }}" method="POST">
                                @csrf
                                <div class="input-box">
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                                            <span class="form-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 18 22" fill="none">
                                                    <path d="M0.375488 0.484741V21.588H5.91374V16.777H8.38577V21.588H9.40112V16.777H11.8747V21.588H17.4129V0.484741H0.375488ZM5.93616 13.8419H3.93275V11.84H5.93616V13.8419ZM5.93616 9.7772H3.93275V7.77378H5.93616V9.7772ZM5.93616 5.71245H3.93275V3.71053H5.93616V5.71245ZM9.89366 13.8419H7.89361V11.84H9.89366V13.8419ZM9.89366 9.7772H7.89361V7.77378H9.89366V9.7772ZM9.89366 5.71245H7.89361V3.71053H9.89366V5.71245ZM13.8545 13.8419H11.8511V11.84H13.8545V13.8419ZM13.8545 9.7772H11.8511V7.77378H13.8545V9.7772ZM13.8545 5.71245H11.8511V3.71053H13.8545V5.71245Z" fill="#D7D7D7"/>
                                                    </svg>
                                            </span>
                                            @error('company_name')
                                              <span class="invalid-txt" role="alert">
                                              {{ $message }}
                                             </span>
                                            @enderror
                                            <span style="color: red" id="company-name-msg"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input type="text" class="form-control" name="company_website" placeholder="Company Website">
                                            <span class="form-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <path d="M14.6123 2.5633H14.6215C15.0747 3.73774 15.4353 4.92143 15.6942 6.08662C15.7682 6.42878 15.833 6.77094 15.8977 7.12235H20.2903C19.1621 4.44055 16.9242 2.32286 14.1499 1.40735L14.2146 1.5738L14.2609 1.67553C14.3903 1.97145 14.5013 2.25813 14.6123 2.5633Z" fill="#D7D7D7"/>
                                                    <path d="M19.6427 8.04724H16.0269C16.1748 9.04598 16.2396 10.0447 16.2396 11.025C16.2396 12.0052 16.1748 13.0039 16.0361 14.0027H20.6229C20.9096 13.0594 21.0668 12.0607 21.0668 11.025C21.0668 9.98923 20.9096 8.99049 20.6229 8.04724H19.6427Z" fill="#D7D7D7"/>
                                                    <path d="M7.15854 19.4772C6.7239 18.349 6.36325 17.1653 6.08582 15.9538C6.01184 15.6117 5.94711 15.2695 5.89162 14.9274H1.49902C2.62723 17.6184 4.86514 19.7176 7.63941 20.6424H7.64866L7.38048 20.032C7.3065 19.8471 7.23252 19.6621 7.15854 19.4772Z" fill="#D7D7D7"/>
                                                    <path d="M15.8977 14.9274C15.8422 15.2695 15.7775 15.6024 15.7035 15.9446C15.4261 17.1653 15.0654 18.349 14.6308 19.4772C14.5938 19.5881 14.5475 19.6991 14.5013 19.8101L14.2239 20.4667L14.1499 20.6424C16.9242 19.7269 19.1621 17.6092 20.2903 14.9274H15.8977Z" fill="#D7D7D7"/>
                                                    <path d="M11.3569 14.0027H15.093C15.2409 12.9947 15.3149 11.996 15.3149 11.025C15.3149 10.0447 15.2409 9.04598 15.1022 8.04724H11.3569V14.0027Z" fill="#D7D7D7"/>
                                                    <path d="M13.4469 2.13798C13.4376 2.11024 13.4284 2.0825 13.4191 2.05475L13.3729 1.94378L13.0122 1.08376C12.4759 0.954292 11.921 0.889559 11.3569 0.861816V7.12242H14.9542C14.908 6.845 14.8525 6.56757 14.7878 6.29014C14.4919 4.91225 14.0387 3.51587 13.4561 2.13798H13.4469Z" fill="#D7D7D7"/>
                                                    <path d="M5.89162 7.12235C5.95635 6.77094 6.02109 6.42878 6.09507 6.08662C6.354 4.92143 6.71466 3.73774 7.16779 2.5633H7.17703C7.22327 2.41533 7.27876 2.27662 7.33424 2.13791L7.49145 1.77725L7.55156 1.63206L7.64866 1.40735C4.87439 2.32286 2.62723 4.43131 1.49902 7.12235H5.89162Z" fill="#D7D7D7"/>
                                                    <path d="M5.75285 14.0027C5.61414 13.0039 5.5494 12.0052 5.5494 11.025C5.5494 10.0447 5.61413 9.04598 5.7621 8.04724H1.16605C0.879377 8.99049 0.722168 9.98923 0.722168 11.025C0.722168 12.0607 0.879377 13.0594 1.16605 14.0027H5.75285Z" fill="#D7D7D7"/>
                                                    <path d="M6.47412 11.025C6.47412 11.996 6.5481 12.9947 6.69606 14.0027H10.4321V8.04724H6.68682C6.5481 9.04598 6.47412 10.0447 6.47412 11.025Z" fill="#D7D7D7"/>
                                                    <path d="M6.99217 15.7504C7.31583 17.2023 7.76897 18.5987 8.34232 19.9118L8.4163 20.0968L8.7862 20.966C9.32256 21.0955 9.86817 21.1602 10.4323 21.188V14.9274H6.83496C6.8812 15.1955 6.93668 15.473 6.99217 15.7504Z" fill="#D7D7D7"/>
                                                    <path d="M8.44404 1.85131L8.34232 2.13798H8.33307C7.75047 3.51587 7.29734 4.91225 7.00142 6.29014C6.93668 6.56757 6.8812 6.845 6.83496 7.12242H10.4323V0.861816C9.84967 0.889559 9.26707 0.96354 8.71222 1.10225L8.44404 1.85131Z" fill="#D7D7D7"/>
                                                    <path d="M13.4469 19.9118C14.0202 18.5987 14.4734 17.2023 14.797 15.7504C14.8525 15.473 14.908 15.1955 14.9542 14.9274H11.3569V21.188C11.9118 21.1602 12.4666 21.0955 12.9938 20.966L13.3729 20.0968L13.4182 19.9839L13.4931 19.8101L13.4469 19.9118Z" fill="#D7D7D7"/>
                                                </svg>
                                            </span>
                                        </div>
                                        @error('company_website')
                                              <span class="invalid-txt" role="alert">
                                              {{ $message }}
                                             </span>
                                        @enderror
                                        <span style="color: red" id="company-website-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="formfield">
                                            <input type="text" class="form-control" name="complete_address" placeholder="Complete address">
                                            <span class="form-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 18 23" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.89429 0.141357C4.28383 0.141357 0.526855 3.98666 0.526855 8.74122C0.526855 11.2961 1.76802 14.0081 3.2974 16.3295C5.50455 19.6812 8.2658 22.2091 8.2658 22.2091C8.62188 22.5354 9.16669 22.5354 9.52277 22.2091C9.52277 22.2091 12.284 19.6812 14.4912 16.3295C16.0205 14.0081 17.2617 11.2961 17.2617 8.74122C17.2617 3.98666 13.5047 0.141357 8.89429 0.141357ZM8.89429 3.86022C11.4594 3.86022 13.5429 5.94371 13.5429 8.50879C13.5429 11.0739 11.4594 13.1574 8.89429 13.1574C6.3292 13.1574 4.24571 11.0739 4.24571 8.50879C4.24571 5.94371 6.3292 3.86022 8.89429 3.86022ZM8.89429 5.71965C7.35468 5.71965 6.10514 6.96918 6.10514 8.50879C6.10514 10.0484 7.35468 11.2979 8.89429 11.2979C10.4339 11.2979 11.6834 10.0484 11.6834 8.50879C11.6834 6.96918 10.4339 5.71965 8.89429 5.71965Z" fill="#D7D7D7"/>
                                                </svg>
                                            </span>
                                        </div>
                                        @error('complete_address')
                                              <span class="invalid-txt" role="alert">
                                              {{ $message }}
                                             </span>
                                        @enderror
                                        <span style="color: red" id="complete-address-msg"></span>
                                    </div>
                                    <div class="two-form-bx">
                                        <div class="form-group">
                                            <div class="formfield">
                                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                                <span class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7993 14.748C19.3219 15.1561 19.3624 15.8699 18.894 16.3383L16.8154 18.417C14.7348 20.4976 8.37536 18.0695 4.83164 14.5257C1.28792 10.982 -1.14059 4.62296 0.940457 2.54191L3.0191 0.463247C3.48933 -0.00699048 4.20282 0.0373421 4.60937 0.55798L7.1093 3.75948C7.51734 4.28204 7.46556 5.08822 6.99715 5.55664L5.6295 6.92429C5.15951 7.39427 5.04234 8.24122 5.38855 8.81366C5.38855 8.81366 6.06304 10.176 7.62218 11.7352C9.18133 13.2943 10.5437 13.9688 10.5437 13.9688C11.1172 14.3057 11.9646 14.1963 12.433 13.7279L13.8007 12.3602C14.2707 11.8902 15.0772 11.8415 15.5978 12.2481L18.7993 14.748Z" fill="#D7D7D7"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            @error('phone_number')
                                              <span class="invalid-txt" role="alert">
                                              {{ $message }}
                                             </span>
                                            @enderror
                                            <span style="color: red" id="phone-msg"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="formfield">
                                                <input type="number" class="form-control" name="company_size" placeholder="Company Size">
                                                <span class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19" viewBox="0 0 24 19" fill="none">
                                                        <path d="M7.87716 10.7614C7.60214 10.4589 7.35462 10.1289 7.1621 9.77137C6.91458 9.79887 6.66707 9.82637 6.39204 9.82637C5.37447 9.82637 4.41189 9.52385 3.61433 9.02881C1.55168 9.55135 0.0390625 11.394 0.0390625 13.5942V16.1518H4.16438C4.24688 13.7317 5.73199 11.669 7.87716 10.7614Z" fill="#D7D7D7"/>
                                                        <path d="M6.39046 8.45126C6.47297 8.45126 6.55548 8.45126 6.63798 8.45126C6.52797 8.03873 6.47297 7.6262 6.47297 7.18617C6.47297 4.986 7.82057 3.06086 9.71822 2.23579C9.00316 1.13571 7.76557 0.420654 6.36296 0.420654C4.13529 0.420654 2.34766 2.23579 2.34766 4.43596C2.34766 6.63613 4.16279 8.45126 6.39046 8.45126Z" fill="#D7D7D7"/>
                                                        <path d="M20.1691 9.02881C19.344 9.52385 18.4089 9.82637 17.3914 9.82637C17.1438 9.82637 16.8688 9.79887 16.6213 9.77137C16.4288 10.1289 16.1813 10.4589 15.9062 10.7614C18.0239 11.669 19.5365 13.7592 19.619 16.1794H23.7443V13.6217C23.7443 11.394 22.2317 9.55135 20.1691 9.02881Z" fill="#D7D7D7"/>
                                                        <path d="M17.2843 7.18608C17.2843 7.62612 17.2293 8.03865 17.1193 8.45118C17.2018 8.45118 17.2843 8.45118 17.3668 8.45118C19.5945 8.45118 21.3821 6.63604 21.3821 4.43587C21.3821 2.23571 19.622 0.393066 17.3943 0.393066C15.9917 0.393066 14.7541 1.10812 14.0391 2.2082C15.9367 3.06077 17.2843 4.95841 17.2843 7.18608Z" fill="#D7D7D7"/>
                                                        <path d="M18.245 16.3717C18.245 14.1716 16.7324 12.3014 14.6698 11.8064C13.8447 12.3014 12.9096 12.604 11.892 12.604C10.8745 12.604 9.91189 12.3014 9.11433 11.8064C7.05168 12.3289 5.53906 14.1716 5.53906 16.3717V18.9294H18.245V16.3717Z" fill="#D7D7D7"/>
                                                        <path d="M11.8942 3.14331C9.66654 3.14331 7.87891 4.95845 7.87891 7.15862C7.87891 9.38629 9.69404 11.1739 11.8942 11.1739C14.1219 11.1739 15.9095 9.35878 15.9095 7.15862C15.9095 4.95845 14.1219 3.14331 11.8942 3.14331Z" fill="#D7D7D7"/>
                                                        </svg>
                                                </span>
                                            </div>
                                            @error('company_size')
                                              <span class="invalid-txt" role="alert">
                                              {{ $message }}
                                             </span>
                                            @enderror
                                            <span style="color: red" id="company-size-msg"></span>
                                        </div>
                                    </div>
                                
                                </div>

                                <button type="submit" class="button primary-btn full-btn">Next</button>
                                
                            </form>

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

     {{-- phone Validation --}}
    <script>
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

    </script>

</body>

</html>