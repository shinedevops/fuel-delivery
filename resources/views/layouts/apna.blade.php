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
                @include('layouts.sidebar')
                <div class="dashboard-content-wrapper">
                    @include('layouts.navigationprofile')
                    <div class="db-content-main">
                        @yield('content')
                    </div>
                </div>
            </div>

        </section>
        @yield('editcontent')
    </div>

    <!--JS-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

</body>

</html>