@extends('layouts.apna')
@section('content')
    <div class="account-setting-wrapper">
        <div class="db-heading-bx">
            <h2>Account Setting</h2>
        </div>
        <div class="account-setting-box">
            <div class="account-setting-header">
                <div class="profile-edit-name">
                    {{-- <img src="images/table-img1.png" alt="" class="edit-pro-img"> --}}
                    <img src="{{ isset($user) ? asset('storage/' . $user->profile_path) : asset('assets/images/table-img1.png') }}"
                        class="edit-pro-img" alt="profile">
                    <div class="edit-heading-bx">
                        <h6>{{ $user->name }}</h6>
                        <p>{{ '###' }}</p>
                    </div>
                </div>
                {{-- <a href="" class="button outline-btn">Edit</a> --}}
                <a href="{{ route('edit-profile', ['user_id' => auth()->user()->id]) }}" class="button outline-btn">Edit</a>
            </div>
            <div class="account-setting-content">
                <div class="as-sslist-bx">
                    <ul class="as-sslist">
                        <li><a href=""><i class="fa-solid fa-building"></i> {{ $user->email }}</a></li>
                        <li><a href=""><i
                                    class="fa-solid fa-phone"></i>{{ isset($userDetails) ? $userDetails->phone_number : 'NA' }}
                            </a></li>
                        <li><a href=""><i class="fa-solid fa-location-dot"></i>
                                {{ isset($userDetails) ? $userDetails->complete_address : 'NA' }}
                            </a></li>
                        <li><a href=""><i class="fa-solid fa-envelope"></i> {{ $user->email }}</a></li>
                        <li><a href=""><i class="fa-solid fa-users"></i></i> 150+</a></li>
                    </ul>
                </div>
                <div class="notify-setting-box">
                    <div class="notify-setting-header">
                        <div class="notify-setting-content">
                            <h3>All Notification</h3>
                            <span>Toggle all notifications</span>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                    <div class="notify-setting-body">
                        <div class="notify-setting-detail">
                            <span>
                                Truck driver accept the order
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Subscription Plan
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                New Order
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Driver Issue
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-setting-footer">
                <a href="#" class="button outline-btn">Change Password</a>
            </div>
        </div>
    </div>
@endsection
