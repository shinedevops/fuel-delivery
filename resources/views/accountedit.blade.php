@extends('layouts.apna')
@section('content')
    <div class="account-setting-wrapper">
        <div class="db-heading-bx">
            <h2>Account Setting</h2>
        </div>
        <div class="as-edit-wrapper">
            <div class="as-edit-box">
                <div class="upload-img">
                    <div class="main-profile-image-box">
                        {{-- <img src="images/table-img1.png" class="main-profile-image"> --}}
                        <img src="{{ isset($user) ? asset('storage/' . $user->profile_path) : asset('assets/images/table-img1.png') }}"
                            class="main-profile-image" alt="profile">
                        <div class="file file--upload">
                            <label for="input-file">
                                <i class="fa-solid fa-camera"></i>
                            </label>
                            {{-- <input id="input-file" type="file"> --}}
                        </div>

                    </div>
                </div>
                @error('profile')
                    <span class="invalid-txt" role="alert">{{ $message }}</span> <br>
                @enderror

                <div class="edit-input-bx">
                    <form class="profile-edit-form" action="{{ route('update-profile', ['id' => auth()->user()->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-box">
                            {{-- for profile input --}}
                            <input id="input-file" type="file" hidden name="profile" placeholder="Choose image"
                            value="{{ $user->profile_path ?? old('profile') }}" alt="no profile">


                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Full Name"
                                        value="{{ $user->name ?? old('name') }}">

                                    <span class="form-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>
                                @error('name')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input class="form-control" name="business_startup" placeholder="Business/ Startup"
                                        value="{{ $userDetails->business_startup ?? old('business_startup') }}">

                                    <span class="form-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                @error('business_startup')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                        value="{{ $user->email ?? old('email') }}">

                                    <span class="form-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Enter your phone number"
                                        value="{{ $userDetails->phone_number ?? old('phone') }}">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </span>
                                </div>
                                @error('phone')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="complete_address"
                                        placeholder="Complete address"
                                        value="{{ $userDetails->complete_address ?? old('complete_address') }}">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                </div>
                                @error('complete_address')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="company_website"
                                        placeholder="Complete website"
                                        value="{{ $userDetails->company_website ?? old('company_website') }}">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-globe"></i>
                                    </span>
                                </div>
                                @error('company_website')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="company_size"
                                        placeholder="Complete Size"
                                        value="{{ $userDetails->company_size ?? old('company_size') }}">
                                    <span class="form-icon">
                                        <i class="fa-solid fa-globe"></i>
                                    </span>
                                </div>
                                @error('company_size')
                                    <span class="invalid-txt" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="button primary-btn full-btn">Save</button>


                    </form>
                </div>
            </div>
            <div class="acc-reset-box">
                <h5>
                    Change Password
                </h5>
                <div class="as-passedit-box">
                    <div class="edit-input-bx">
                        <form class="profile-edit-form"
                            action="{{ route('changePassword', ['id' => auth()->user()->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if (session('success_password'))
                                <div class="alert alert-success" id="successAlert">
                                    {{ session('success_password') }}
                                </div>
                            @endif
                            <div class="input-box">
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" name="old_password"
                                            placeholder="old Password">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>
                                    @error('old_password')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm Password">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>

                            <button type="submit" class="button primary-btn full-btn mt-3">Save password</button>
                            {{-- @if ('status' == 'success')
                            <div class="alert alert-success" role="alert">
                                <p>{{ ('Password updated successfully') }}</p>
                            </div>
                            @endif --}}



                        </form>
                    </div>
                </div>
                <div class="notify-setting-box-edit">
                    <div class="notify-setting-header">
                        <div class="notify-setting-content">
                            <h3>All Notification</h3>
                            <span>Toggle all notifications</span>
                        </div>
                        <div class="form-check form-switch">
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
                                    value="{{ $userNotification->accept_order ?? '0' }}" type="checkbox" id=""
                                    checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Subscription Plan
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox"
                                    name="subscription" value="{{ $userNotification->subscription ?? '0' }}"
                                    id="" checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                New Order
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox" name="new_order"
                                    value="{{ $userNotification->new_order ?? '0' }}" id="" checked="">
                            </div>
                        </div>
                        <div class="notify-setting-detail">
                            <span>
                                Driver Issue
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckDefault" type="checkbox" name="issue"
                                    value="{{ $userNotification->issue ?? '0' }}" id="" checked="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $(".profile-edit-form").validate({
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
                    
                }
            });

            // Click event handler for the "Save" button
            $('.button.primary-btn.full-btn').on('click', function(e) {
                e.preventDefault();
                if ($(".profile-edit-form").valid()) {
                    $(".profile-edit-form").submit();
                }
            });
        });
    </script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('.flexSwitchCheckDefault').click(function() {
                const notificationName = $(this).attr(
                    'name'); // Retrieve 'name' attribute directly from the clicked checkbox
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
        $(document).ready(function() {
            $('#togel').click(function() {
                $('.flexSwitchCheckDefault').prop('checked', this.checked);
            });

            $('.flexSwitchCheckDefault').click(function() {
                if (!$(this).prop('checked')) {
                    $('#togel').prop('checked', false);
                }
            });
        });
    </script>

    {{-- Close success message --}}
    <script>
        $(document).ready(function() {

            setTimeout(function() {
                $("#successAlert").alert('close');
            }, 3000);
        });
    </script>

@stop
