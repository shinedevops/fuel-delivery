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
                        <li><a href=""><i class="fa-solid fa-users"></i></i> {{ isset($userDetails) ? $userDetails->company_size : 'NA' }}</a></li>
                    </ul>
                </div>
                <div class="notify-setting-box">
                    <div class="notify-setting-header">
                        <div class="notify-setting-content">
                            <h3>All Notification</h3>
                            <span>Toggle all notifications</span>
                        </div>
                        <div class="form-check form-switch ">
                            <input class="form-check-input" name="allactive" value="" type="checkbox"
                                id="togel">
                        </div>
                    </div>
                    <div class="notify-setting-body">
                        <div class="notify-setting-detail">
                            <span>
                                Truck driver accept the order
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckDefault" name="accept_order"
                                    value="{{ $userNotification->accept_order ?? '0' }}" type="checkbox"
                                    id="" checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Subscription Plan
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox" name="subscription"
                                    value="{{ $userNotification->subscription ?? '0' }}" id=""
                                    checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                New Order
                            </span>
                            <div class="form-check form-switch flexSwitchCheckDefault">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox" name="new_order"
                                    value="{{ $userNotification->new_order ?? '0' }}" id="" checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Driver Issue
                            </span>
                            <div class="form-check form-switch flexSwitchCheckDefault">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox" name="issue"
                                    value="{{ $userNotification->issue ?? '0' }}" id="" checked="">
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
@section('scripts')
<script>
        $(document).ready(function() {
            $('.flexSwitchCheckDefault').click(function() {
                const notificationName = $(this).attr('name'); // Retrieve 'name' attribute directly from the clicked checkbox
                const value = $(this).val(); // Retrieve 'value' attribute from the clicked checkbox

                // const isChecked = $(this).prop('checked');

                // AJAX call to send data to the server
                $.ajax({
                    type: 'POST',
                    url: '{{ route('notification') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        notificationName: notificationName,
                        value: value,
                        // isChecked: isChecked
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#togel').click(function(){
            $('.flexSwitchCheckDefault').prop('checked', this.checked);
            });

            $('.flexSwitchCheckDefault').click(function(){
            if(!$(this).prop('checked')){
                $('#togel').prop('checked', false);
            }
            });
        });
    </script>
@stop
