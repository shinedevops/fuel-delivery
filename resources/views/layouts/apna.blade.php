<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver edit profile</title>
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/login-register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>

<body>
    <div class="main">
        <section class="dashboard-section">
            <div class="dashboard-wrapper">
                @include('layout.sidebar')
                <div class="dashboard-content-wrapper">
                    @include('')
                    <div class="db-content-main">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade cstm-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
                <div class="addnew-dis-box">
                    <div  class="popup-btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                        <path d="M8.18921 7.8446L13.9092 2.12463C14.0417 1.98245 14.1138 1.79439 14.1104 1.60009C14.1069 1.40579 14.0283 1.22042 13.8909 1.083C13.7535 0.94559 13.5681 0.866887 13.3738 0.863459C13.1795 0.860031 12.9914 0.932151 12.8492 1.06463L7.12927 6.7846L1.40918 1.06463C1.267 0.932151 1.07907 0.860031 0.884766 0.863459C0.690464 0.866887 0.504967 0.94559 0.367554 1.083C0.230141 1.22042 0.1515 1.40579 0.148071 1.60009C0.144643 1.79439 0.216763 1.98245 0.349243 2.12463L6.06921 7.8446L0.349243 13.5646C0.208793 13.7053 0.129883 13.8958 0.129883 14.0946C0.129883 14.2934 0.208793 14.484 0.349243 14.6246C0.490964 14.7635 0.680858 14.8423 0.879272 14.8446C1.07727 14.8403 1.26633 14.7618 1.40918 14.6246L7.12927 8.9046L12.8492 14.6246C12.991 14.7635 13.1809 14.8423 13.3793 14.8446C13.5773 14.8403 13.7663 14.7618 13.9092 14.6246C14.0496 14.484 14.1285 14.2934 14.1285 14.0946C14.1285 13.8958 14.0496 13.7053 13.9092 13.5646L8.18921 7.8446Z" fill="#292929"/>
                      </svg></div>
                    <div class="login-header text-center"> 
                        <h4>Add new dispatcher</h4>
                    </div>
                    <form class="addnew-dis-form">
                        <div class="input-box">
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="Full Name" placeholder="Full Name">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="email" class="form-control" name="Email ID" placeholder="Email ID">   
                                    <span class="form-icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="Phone number" placeholder="Phone number">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="button primary-btn full-btn">Send Invitation</button>
                        
                    </form>

                </div>
            </div>

          </div>
        </div>
      </div>

    <!--JS-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

</body>

</html>