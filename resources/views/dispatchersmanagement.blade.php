@extends('layouts.apna')
@section('content')
    <div class="db-heading-bx">
        <h2>Dispatchers Management</h2>
        <div class="right-db-head">
            <div class="formfield">
                <input type="text" class="form-control" name="Search" placeholder="Type to Search..">
                <a href="#" class="button search-btn"><i class="fa-solid fa-magnifying-glass"></i>Search</a>
            </div>
            <a href="#" type="button" class="button primary-btn" data-bs-toggle="modal"
                data-bs-target="#dispatchersManagementPopup"><i class="fa-solid fa-plus"></i>Invite dispatchers</a>
        </div>
    </div>
    <div class="db-table-box">
        <div class="tb-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Company Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $dedails)
                        <tr>
                            <td>
                                <div class="table-data">
                                    <div class="table-img">
                                        {{-- <img src="/assets/images/table-img1.png" alt=""> --}}
                                        <img src="{{ isset(auth()->user()->profile_path) ? asset('storage/' . auth()->user()->profile_path) : asset('assets/images/table-img1.png') }}"
                                            class="user-profile">
                                    </div>
                                    {{ $dedails->name }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-envelope"></i>
                                    {{ $dedails->email ?? 'NA' }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $dedails->userDetails->phone_number ?? 'NA' }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-building"></i>
                                    {{ $dedails->userDetails->company_name ?? 'NA' }}

                                </div>
                            </td>

                            <td>
                                {{-- <div class="table-data">
                                <i class="fa-solid fa-trash-can" style="color: #FD5C5C;"></i>
                            </div> --}}

                                <div class="table-data delete-user" data-user-id="{{ $dedails->id }}">
                                    <i class="fa-solid fa-trash-can" style="color: #FD5C5C;"></i>
                                </div>
                            </td>

                            </td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                        <td>
                            <div class="table-data">
                                <div class="table-img">
                                    <img src="/assets/images/table-img1.jpg" alt="">
                                </div>
                                Roger Bergson
                            </div>
                        </td>
                        <td>
                            <div class="table-data">
                                <i class="fa-solid fa-envelope"></i>
                                rogerbergson@gmail.vom
                            </div>
                        </td>
                        <td>
                            <div class="table-data">
                                <i class="fa-solid fa-phone"></i>
                                +1245-1231-123
                            </div>
                        </td>
                        <td>
                            <div class="table-data">
                                <i class="fa-solid fa-building"></i>
                                ExxonMobil
                            </div>
                        </td>
                        <td>
                            <div class="table-data">
                                <i class="fa-solid fa-trash-can" style="color: #FD5C5C;"></i>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    <div class="db-pagination-bx">
        <div class="pagination-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path
                    d="M5.82554 11.7343C5.93433 11.7343 6.04327 11.6929 6.12635 11.6098C6.29252 11.4436 6.29252 11.1743 6.12635 11.0081L1.32272 6.20465L6.12621 1.40116C6.29238 1.235 6.29238 0.965702 6.12621 0.799674C5.96005 0.633507 5.69075 0.633507 5.52458 0.799674L0.420282 5.90398C0.340516 5.98374 0.295726 6.09199 0.295726 6.20479C0.295726 6.3176 0.340516 6.42584 0.420282 6.50561L5.52472 11.6098C5.60781 11.6929 5.7166 11.7343 5.82554 11.7343Z"
                    fill="CurrentColor" />
            </svg>
        </div>
        <div class="pagination-no-bx">
            <div class="pagination-no active">
                1
            </div>
            <div class="pagination-no">
                2
            </div>
            <div class="pagination-no">
                3
            </div>
            <div class="pagination-no">
                ...
            </div>
            <div class="pagination-no">
                10
            </div>
        </div>
        <div class="pagination-next active">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
                <path
                    d="M1.3356 11.7344C1.2268 11.7344 1.11786 11.693 1.03478 11.6099C0.868615 11.4437 0.868615 11.1744 1.03478 11.0083L5.83841 6.20477L1.03492 1.40129C0.868753 1.23512 0.868753 0.965824 1.03492 0.799796C1.20109 0.633629 1.47038 0.633629 1.63655 0.799796L6.74085 5.9041C6.82062 5.98386 6.86541 6.09211 6.86541 6.20491C6.86541 6.31772 6.82062 6.42596 6.74085 6.50573L1.63641 11.6099C1.55333 11.693 1.44453 11.7344 1.3356 11.7344Z"
                    fill="CurrentColor" />
            </svg>
        </div>
    </div>
@endsection


@section('editcontent')
    <div class="modal fade cstm-modal" id="dispatchersManagementPopup" tabindex="-1"
        aria-labelledby="DispatchersManagementPopLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="addnew-dis-box">
                        <div class="popup-btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                fill="none">
                                <path
                                    d="M8.18921 7.8446L13.9092 2.12463C14.0417 1.98245 14.1138 1.79439 14.1104 1.60009C14.1069 1.40579 14.0283 1.22042 13.8909 1.083C13.7535 0.94559 13.5681 0.866887 13.3738 0.863459C13.1795 0.860031 12.9914 0.932151 12.8492 1.06463L7.12927 6.7846L1.40918 1.06463C1.267 0.932151 1.07907 0.860031 0.884766 0.863459C0.690464 0.866887 0.504967 0.94559 0.367554 1.083C0.230141 1.22042 0.1515 1.40579 0.148071 1.60009C0.144643 1.79439 0.216763 1.98245 0.349243 2.12463L6.06921 7.8446L0.349243 13.5646C0.208793 13.7053 0.129883 13.8958 0.129883 14.0946C0.129883 14.2934 0.208793 14.484 0.349243 14.6246C0.490964 14.7635 0.680858 14.8423 0.879272 14.8446C1.07727 14.8403 1.26633 14.7618 1.40918 14.6246L7.12927 8.9046L12.8492 14.6246C12.991 14.7635 13.1809 14.8423 13.3793 14.8446C13.5773 14.8403 13.7663 14.7618 13.9092 14.6246C14.0496 14.484 14.1285 14.2934 14.1285 14.0946C14.1285 13.8958 14.0496 13.7053 13.9092 13.5646L8.18921 7.8446Z"
                                    fill="#292929" />
                            </svg></div>
                        <div class="login-header text-center">
                            <h4>Add new dispatcher</h4>
                        </div>
                        <form id="registerform" class="addnew-dis-form" action="{{ route('dispatcheradd', ['id' => auth()->user()->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-box">
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" name="name" placeholder="Full Name"
                                            {{ old('name') }}>
                                        <span class="form-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                    </div>
                                    @error('name')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                <div class="formfield">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                        value="{{ $user->name ?? old('name') }}">

                                    <span class="form-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    </div>
                                    @error('name')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter your email" value="{{ old('email') }}">

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
                                            placeholder="Enter your phone number" value="{{ old('phone') }}">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                    </div>
                                    @error('phone')
                                        <span class="invalid-txt" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="button primary-btn full-btn">Send Invitation</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
  {{-- for delele user --}}
@section('scripts')

    <script>
        $(document).ready(function() {
            $('.delete-user').on('click', function() {
                var userId = $(this).data('user-id');

                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('deleteuser') }}', // Replace with your route URL
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": userId,
                        },
                        success: function(response) {
                            console.log(response);
                            
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>

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
                    phone: {
                        required: true,
                        // minlength: 10,
                    }
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
                    phone: {
                        required: 'Phone is required',
                    }
                   
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
