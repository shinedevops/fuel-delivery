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
                    <div class="db-nav">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container">
                              
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                                <div class="last-nav d-flex">
                                  <div class="dropdown">
                                      <div class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                          <div class="user-feed-profile d-flex align-items-center">
                                              <div class="user-feed-profile-img position-relative">
                                                  <img src="images/profile.png" class="user-profile" alt="feed-profile">
                                              <i class="fa-solid fa-chevron-down"></i>
                                              </div>
                                              
                                          </div>
                                      </div>                
                                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                        <div class="person-dropdown-header">
                                          <div class="profile-menus">
                                              <a href="#" class="header-profile-link active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18" fill="none">
                                                    <path d="M7.38063 9.1329C5.04716 9.1329 3.15625 7.24199 3.15625 4.90852C3.15625 2.57505 5.04716 0.684143 7.38063 0.684143C9.71409 0.684143 11.605 2.57505 11.605 4.90852C11.605 7.24199 9.71409 9.1329 7.38063 9.1329ZM7.38063 2.31355C5.93227 2.31355 4.76554 3.48028 4.76554 4.92864C4.76554 6.35688 5.93227 7.54373 7.38063 7.54373C8.82899 7.54373 9.99572 6.37699 9.99572 4.92864C9.99572 3.48028 8.82899 2.31355 7.38063 2.31355Z" fill="#122C91"/>
                                                    <path d="M14.5 17.2398H12.8907V16.234C12.8907 13.3574 10.5371 11.0038 7.66053 11.0038H7.09728C4.22068 11.0038 1.8671 13.3574 1.8671 16.234V17.2398H0.257812V16.234C0.257812 12.4723 3.33557 9.39453 7.09728 9.39453H7.66053C11.4222 9.39453 14.5 12.4723 14.5 16.234V17.2398Z" fill="#122C91"/>
                                                </svg>
                                                <span>Profile Setting</span>
                                              </a>
                                              <a href="#" class="header-profile-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19" fill="none">
                                                    <path d="M7.76797 17.966C7.76797 18.2149 7.66906 18.4537 7.49301 18.6298C7.31696 18.8058 7.07818 18.9047 6.8292 18.9047H1.19658C0.947605 18.9047 0.708825 18.8058 0.532772 18.6298C0.356718 18.4537 0.257812 18.2149 0.257812 17.966V1.0681C0.257812 0.819126 0.356718 0.580346 0.532772 0.404293C0.708825 0.228239 0.947605 0.129333 1.19658 0.129333H6.8292C7.07818 0.129333 7.31696 0.228239 7.49301 0.404293C7.66906 0.580346 7.76797 0.819126 7.76797 1.0681C7.76797 1.31708 7.66906 1.55586 7.49301 1.73191C7.31696 1.90797 7.07818 2.00687 6.8292 2.00687H2.13535V17.0272H6.8292C7.07818 17.0272 7.31696 17.1261 7.49301 17.3021C7.66906 17.4782 7.76797 17.717 7.76797 17.966ZM15.203 9.1603C15.1583 9.04506 15.0913 8.93978 15.0059 8.8505L11.2508 5.09542C11.1633 5.00789 11.0594 4.93846 10.945 4.89109C10.8306 4.84372 10.7081 4.81934 10.5843 4.81934C10.3343 4.81934 10.0945 4.91865 9.91775 5.09542C9.83022 5.18295 9.76079 5.28687 9.71342 5.40123C9.66605 5.51559 9.64167 5.63816 9.64167 5.76195C9.64167 6.01195 9.74098 6.2517 9.91775 6.42848L12.0769 8.57826H4.95166C4.70268 8.57826 4.4639 8.67717 4.28785 8.85322C4.1118 9.02927 4.01289 9.26805 4.01289 9.51703C4.01289 9.76601 4.1118 10.0048 4.28785 10.1808C4.4639 10.3569 4.70268 10.4558 4.95166 10.4558H12.0769L9.91775 12.6056C9.82976 12.6929 9.75992 12.7967 9.71226 12.9111C9.6646 13.0255 9.64006 13.1482 9.64006 13.2721C9.64006 13.396 9.6646 13.5187 9.71226 13.6331C9.75992 13.7475 9.82976 13.8514 9.91775 13.9386C10.005 14.0266 10.1089 14.0965 10.2232 14.1441C10.3376 14.1918 10.4603 14.2163 10.5843 14.2163C10.7082 14.2163 10.8309 14.1918 10.9453 14.1441C11.0597 14.0965 11.1635 14.0266 11.2508 13.9386L15.0059 10.1836C15.0913 10.0943 15.1583 9.989 15.203 9.87376C15.2969 9.64521 15.2969 9.38885 15.203 9.1603Z" fill="#33313F"/>
                                                </svg>
                                                <span>Log out</span>
                                              </a>
                                          </div>
                                        </div>
                                      </ul>
                                    </div>
                                </div>
                                
                              </div>
                            </div>
                          </nav>
                    </div>
                    <div class="db-content-main">
                        <div class="db-edit-content-box">
                            <div class="driver-left-edit-bx">
                                <div class="db-heading-bx">
                                    <h2>Profile</h2>
                                </div>
                                <div class="driver-edit-profile-wrapper">
                                    <div class="driver-edit-box">
                                        <div class="profile-edit-box">
                                            <div class="profile-edit-header">
                                                <div class="profile-edit-name">
                                                    <img src="images/table-img1.png" alt="" class="edit-pro-img">
                                                    <div class="edit-heading-bx">
                                                        <h6>Roger Bergson</h6>
                                                        <p>ExxonMobil</p>
                                                    </div>
                                                </div>
                                                <a href="" class="button edit-proile-btn">Edit profile</a>
                                            </div>
                                            <div class="edit-detail-pl">
                                                <ul>
                                                    <li><span class="edit-detail-icon"><i class="fa-solid fa-envelope"></i></span><a href="">rogerbergson@gmail.com</a></li>
                                                    <li><span class="edit-detail-icon"><i class="fa-solid fa-phone"></i></span><a href="">+1245-1231-123</a></li>
                                                    <li><span class="edit-detail-icon"><svg xmlns="http://www.w3.org/2000/svg" width="52" height="13" viewBox="0 0 52 13" fill="none">
                                                        <path d="M3.7896 12.514H0.0225497V0.877674H3.90891C5.04906 0.877674 6.02823 1.11063 6.84641 1.57654C7.6646 2.03866 8.29149 2.70343 8.7271 3.57086C9.16649 4.43449 9.38619 5.47048 9.38619 6.67881C9.38619 7.89093 9.1646 8.9326 8.72141 9.80381C8.28202 10.675 7.64566 11.3455 6.81232 11.8152C5.97899 12.2811 4.97141 12.514 3.7896 12.514ZM1.77823 10.9799H3.693C4.57937 10.9799 5.31611 10.8133 5.90323 10.4799C6.49035 10.1428 6.92975 9.65608 7.22141 9.01972C7.51308 8.37957 7.65891 7.59927 7.65891 6.67881C7.65891 5.76593 7.51308 4.99131 7.22141 4.35495C6.93353 3.71858 6.50361 3.23563 5.93164 2.90608C5.35967 2.57654 4.64944 2.41177 3.80096 2.41177H1.77823V10.9799ZM11.818 12.622C11.5074 12.622 11.2404 12.5121 11.0169 12.2924C10.7934 12.069 10.6816 11.8 10.6816 11.4856C10.6816 11.175 10.7934 10.9099 11.0169 10.6902C11.2404 10.4667 11.5074 10.3549 11.818 10.3549C12.1286 10.3549 12.3957 10.4667 12.6191 10.6902C12.8426 10.9099 12.9544 11.175 12.9544 11.4856C12.9544 11.694 12.9013 11.8853 12.7953 12.0595C12.693 12.2299 12.5566 12.3663 12.3862 12.4686C12.2157 12.5709 12.0263 12.622 11.818 12.622ZM25.4743 6.69586C25.4743 7.93828 25.247 9.00646 24.7924 9.9004C24.3379 10.7906 23.7148 11.4762 22.9231 11.9572C22.1352 12.4345 21.2394 12.6731 20.2356 12.6731C19.228 12.6731 18.3284 12.4345 17.5368 11.9572C16.7489 11.4762 16.1277 10.7887 15.6731 9.89472C15.2186 9.00078 14.9913 7.93449 14.9913 6.69586C14.9913 5.45343 15.2186 4.38714 15.6731 3.49699C16.1277 2.60305 16.7489 1.91745 17.5368 1.44017C18.3284 0.959113 19.228 0.718583 20.2356 0.718583C21.2394 0.718583 22.1352 0.959113 22.9231 1.44017C23.7148 1.91745 24.3379 2.60305 24.7924 3.49699C25.247 4.38714 25.4743 5.45343 25.4743 6.69586ZM23.7356 6.69586C23.7356 5.74889 23.5822 4.95154 23.2754 4.30381C22.9724 3.6523 22.5557 3.15987 22.0254 2.82654C21.4989 2.48942 20.9023 2.32086 20.2356 2.32086C19.5652 2.32086 18.9667 2.48942 18.4402 2.82654C17.9136 3.15987 17.497 3.6523 17.1902 4.30381C16.8871 4.95154 16.7356 5.74889 16.7356 6.69586C16.7356 7.64283 16.8871 8.44207 17.1902 9.09358C17.497 9.74131 17.9136 10.2337 18.4402 10.5709C18.9667 10.9042 19.5652 11.0709 20.2356 11.0709C20.9023 11.0709 21.4989 10.9042 22.0254 10.5709C22.5557 10.2337 22.9724 9.74131 23.2754 9.09358C23.5822 8.44207 23.7356 7.64283 23.7356 6.69586ZM27.9118 12.622C27.6011 12.622 27.3341 12.5121 27.1106 12.2924C26.8871 12.069 26.7754 11.8 26.7754 11.4856C26.7754 11.175 26.8871 10.9099 27.1106 10.6902C27.3341 10.4667 27.6011 10.3549 27.9118 10.3549C28.2224 10.3549 28.4894 10.4667 28.7129 10.6902C28.9364 10.9099 29.0481 11.175 29.0481 11.4856C29.0481 11.694 28.9951 11.8853 28.889 12.0595C28.7868 12.2299 28.6504 12.3663 28.4799 12.4686C28.3095 12.5709 28.1201 12.622 27.9118 12.622ZM31.46 12.514V0.877674H35.7214C36.5472 0.877674 37.2309 1.01404 37.7726 1.28677C38.3142 1.5557 38.7195 1.92123 38.9885 2.38336C39.2574 2.84169 39.3919 3.35873 39.3919 3.93449C39.3919 4.41934 39.3029 4.82843 39.1248 5.16177C38.9468 5.49131 38.7082 5.75646 38.4089 5.95722C38.1135 6.15419 37.7877 6.29813 37.4316 6.38904V6.50267C37.818 6.52161 38.1949 6.64661 38.5623 6.87767C38.9335 7.10495 39.2404 7.42881 39.4828 7.84927C39.7252 8.26972 39.8464 8.78108 39.8464 9.38336C39.8464 9.97805 39.7063 10.5121 39.426 10.9856C39.1494 11.4553 38.7214 11.8284 38.1419 12.1049C37.5623 12.3777 36.8218 12.514 35.9203 12.514H31.46ZM33.2157 11.0084H35.7498C36.5907 11.0084 37.193 10.8455 37.5566 10.5197C37.9203 10.194 38.1021 9.78677 38.1021 9.29813C38.1021 8.9307 38.0093 8.59358 37.8237 8.28677C37.6381 7.97995 37.3729 7.73563 37.0282 7.55381C36.6873 7.37199 36.282 7.28108 35.8123 7.28108H33.2157V11.0084ZM33.2157 5.91177H35.568C35.9619 5.91177 36.3161 5.83601 36.6305 5.68449C36.9487 5.53298 37.2006 5.32086 37.3862 5.04813C37.5756 4.77161 37.6703 4.44586 37.6703 4.07086C37.6703 3.5898 37.5017 3.18639 37.1646 2.86063C36.8275 2.53487 36.3104 2.37199 35.6135 2.37199H33.2157V5.91177ZM51.1689 5.95722V7.43449H46.0098V5.95722H51.1689Z" fill="#D7D7D7"/>
                                                        </svg></span><a href="">30/12/1996</a></li>
                                                </ul>
                                            </div>
                                            <div class="edit-document-img">
                                                <h6>Documents</h6>
                                                <img src="images/lisence.png" class="lisence-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-detail-wrapper">
                                <div class="order-detail-header">
                                    <h6>All Orders</h6>
                                    <a href="" class="view-all-link">View all</a>
                                </div>
                                <div class="order-detail-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                          <button class="nav-link active" id="active-order-tab" data-bs-toggle="tab" data-bs-target="#active-order" type="button" role="tab" aria-controls="active-order" aria-selected="true"><i class="fa-regular fa-circle-dot"></i>Active</button>
                                          <button class="nav-link" id="completed-order-tab" data-bs-toggle="tab" data-bs-target="#completed-order" type="button" role="tab" aria-controls="completed-order" aria-selected="false"><i class="fa-solid fa-circle-check"></i>Completed</button>
                                          
                                      </nav>
                                      <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="active-order" role="tabpanel" aria-labelledby="active-order-tab">
                                            <div class="order-detail-box-wrapper">
                                                <div class="od-wrapper">
                                                    <div class="od-box">
                                                        <div class="order-detail-box">
                                                            <table>
                                                                <tbody> 
                                                                    <tr>
                                                                        <td style="width: 45%;" ><p class="order-del-title">Order number:</p></td>
                                                                        <td style="width: 55%;">#123456478</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier name:</p></td>
                                                                        <td>Justin Vaccaro</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Customer Location:</p></td>
                                                                        <td>DC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier Location:</p></td>
                                                                        <td>BC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Pickup Date:</p></td>
                                                                        <td>30 jan 2023</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Weight:</p></td>
                                                                        <td>40 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Product Type:</p></td>
                                                                        <td>Petrol , 25 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign=top><p class="order-del-title">Special instructions:</p></td>
                                                                        <td>This is the address of the White House, but since it is a dummy location.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="od-box">
                                                        <div class="order-detail-box">
                                                            <table>
                                                                <tbody> 
                                                                    <tr>
                                                                        <td style="width: 45%;" ><p class="order-del-title">Order number:</p></td>
                                                                        <td style="width: 55%;">#123456478</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier name:</p></td>
                                                                        <td>Justin Vaccaro</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Customer Location:</p></td>
                                                                        <td>DC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier Location:</p></td>
                                                                        <td>BC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Pickup Date:</p></td>
                                                                        <td>30 jan 2023</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Weight:</p></td>
                                                                        <td>40 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Product Type:</p></td>
                                                                        <td>Petrol , 25 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign=top><p class="order-del-title">Special instructions:</p></td>
                                                                        <td>This is the address of the White House, but since it is a dummy location.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="od-box">
                                                        <div class="order-detail-box">
                                                            <table>
                                                                <tbody> 
                                                                    <tr>
                                                                        <td style="width: 45%;" ><p class="order-del-title">Order number:</p></td>
                                                                        <td style="width: 55%;">#123456478</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier name:</p></td>
                                                                        <td>Justin Vaccaro</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Customer Location:</p></td>
                                                                        <td>DC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier Location:</p></td>
                                                                        <td>BC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Pickup Date:</p></td>
                                                                        <td>30 jan 2023</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Weight:</p></td>
                                                                        <td>40 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Product Type:</p></td>
                                                                        <td>Petrol , 25 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign=top><p class="order-del-title">Special instructions:</p></td>
                                                                        <td>This is the address of the White House, but since it is a dummy location.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="od-box">
                                                        <div class="order-detail-box">
                                                            <table>
                                                                <tbody> 
                                                                    <tr>
                                                                        <td style="width: 45%;" ><p class="order-del-title">Order number:</p></td>
                                                                        <td style="width: 55%;">#123456478</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier name:</p></td>
                                                                        <td>Justin Vaccaro</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Customer Location:</p></td>
                                                                        <td>DC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier Location:</p></td>
                                                                        <td>BC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Pickup Date:</p></td>
                                                                        <td>30 jan 2023</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Weight:</p></td>
                                                                        <td>40 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Product Type:</p></td>
                                                                        <td>Petrol , 25 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign=top><p class="order-del-title">Special instructions:</p></td>
                                                                        <td>This is the address of the White House, but since it is a dummy location.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="od-box">
                                                        <div class="order-detail-box">
                                                            <table>
                                                                <tbody> 
                                                                    <tr>
                                                                        <td style="width: 45%;" ><p class="order-del-title">Order number:</p></td>
                                                                        <td style="width: 55%;">#123456478</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier name:</p></td>
                                                                        <td>Justin Vaccaro</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Customer Location:</p></td>
                                                                        <td>DC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Supplier Location:</p></td>
                                                                        <td>BC 20500United States</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Pickup Date:</p></td>
                                                                        <td>30 jan 2023</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Weight:</p></td>
                                                                        <td>40 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><p class="order-del-title">Product Type:</p></td>
                                                                        <td>Petrol , 25 B</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td valign=top><p class="order-del-title">Special instructions:</p></td>
                                                                        <td>This is the address of the White House, but since it is a dummy location.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="completed-order" role="tabpanel" aria-labelledby="completed-order-tab">...</div>

                                      </div>
                                </div>
                            </div>
                        </div>    
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