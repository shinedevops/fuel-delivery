@extends('layouts.apna')
@section('content')
    <div class="db-heading-bx">
        <h2>Dispatchers Management</h2>
        <div class="right-db-head">
            <div class="formfield">
                {{-- <input type="text" id="search_data" class="form-control" name="Search" placeholder="Type to Search.."> --}}
                <a href="#" class="button search-btn" id="form_submit"><i class="fa-solid fa-magnifying-glass"></i>Search</a>
                <form id="searchdata" method="POST" action="{{ route('dispatchers.search') }}" enctype="multipart/form-data" class="addnew-dis-form">
                    @csrf

                    <input type="text" id="search_data" class="form-control" name="search" placeholder="Type to Search.." value="{{ $search ?? '' }}">
                    <button type="submit" style="display: none"></button>

                </form>

            </div>
            <a href="#" type="button" class="button primary-btn" data-bs-toggle="modal"
                data-bs-target="#dispatchersManagementPopup"><i class="fa-solid fa-plus"></i>Invite dispatchers
            </a>

        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success"  id="successAlert">
            {{ session('success') }}
        </div>
    @endif

    <div class="db-table-box">
        <div class="tb-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Company Name</th>
                        <th>Invitation</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $details)
                        <tr>
                            <td>
                                <div class="table-data">
                                    <div class="table-img">
                                        {{-- <img src="/assets/images/table-img1.png" alt=""> --}}
                            
                                        <img src="{{ asset($details->profile_path ? 'storage/' . $details->profile_path : 'assets/images/profile.png') }}"
                                        class="user-profile" alt="Profile Image">
                                    </div>
                                    {{ $details->name }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-envelope"></i>
                                    {{ $details->email ?? 'NA' }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-phone"></i>
                                    {{ $details->userDetails->phone_number ?? 'NA' }}
                                </div>
                            </td>
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid fa-building"></i>
                                    {{ $details->userDetails->company_name ?? 'NA' }}

                                </div>
                            </td>

                            <td>
                                <div class="table-data">
                                    <i class="fa-solid"></i>
                                    {{ $details->invitation_status ?? 'False' }}
                                    {{-- {{ $details->UserDetails->invitation_status ?? 'False' }} --}}

                                </div>
                            </td>
                            {{-- Find roll of each user --}}
                            <td>
                                <div class="table-data">
                                    <i class="fa-solid"></i>
                                    {{ $details->getRoleNames()->implode(', ')  ?? 'NA'}}
                                </div>
                            </td>
                                
                            <td>

                                <div class="table-data delete-user" data-user-id="{{ $details->id }}">
                                    <i class="fa-solid fa-trash-can" style="color: #FD5C5C;"></i>
                                </div><br>
                                <div class="table-data edit-user" data-user-id="{{ $details->id }}">

                                    {{-- <a href="{{ route('fetchdata', ['user_id' => $details->id]) }}" type="button" --}}
                                    {{-- class="fa-solid fa-pencil" data-bs-toggle="modal" --}}
                                    <i class="fa-solid fa-pencil" data-bs-toggle="modal"
                                        data-bs-target="#dispatcherEdit"></i>
                                    {{-- data-bs-target="#dispatcherEdit"></a> --}}
                                </div>

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
        
        {{-- {{ $users->links('pagination::simple-bootstrap-5') }} --}}
        {{-- {{ $users->onEachSide(1)->withQueryString()->onEachSide(1)->links('pagination::simple-bootstrap-5') }} --}}
        {{-- {{ $users->render('custom-pagination') }} --}}
        {{-- {{ $users->links('custom-pagination') }} --}}
        {{$users}}
     
    </div>
    
@endsection

@section('editcontent')
    {{-- Add User --}}
    <div class="modal fade cstm-modal add-modal" id="dispatchersManagementPopup" tabindex="-1"
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
                        <form id="registerform" class="addnew-dis-form"
                            action="{{ route('dispatchers.add', ['id' => auth()->user()->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-box">
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" name="name" placeholder="Full Name"
                                            value="{{ old('name') }}">
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
                                 <div class="form-group">
                                    Role:
                                    <div class="formfield">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="carrier" name="role" value="carrier">
                                            <label class="form-check-label" for="carrier" style="color:#6c6767">Carrier</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="ditributor" name="role" value="distributor">
                                            <label class="form-check-label" for="ditributor" style="color:#6c6767">Distributor</label>
                                        </div>
                                    </div>
                                    @error('role')
                                        <span class="invalid-txt" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="button primary-btn full-btn add">Send Invitation</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- for Edit --}}
    <div class="modal fade cstm-modal edit-modal" id="dispatcherEdit" tabindex="-1"
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
                            <h4>Edit dispatcher</h4>
                        </div>
                        <form id="registerformedit" class="addnew-dis-form" action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- id for edit --}}
                            <input type="hidden" id="editUserId" name="id" value="">  

                            <div class="input-box">
                                <div class="input-box">
                                <div class="upload-img">
                                    <div class="main-profile-image-box">
                                        <img id="image_profile" src="" class="main-profile-image" alt="profile">
                                        <div class="file file--upload">
                                            <label for="input-file">
                                                <i class="fa-solid fa-camera"></i>
                                            </label>
                                            {{-- <input id="input-file" type="file" hidden name="imageedit" accept="image/*"> --}}
                                            <input id="input-file" type="file" hidden="" name="imageedit" placeholder="Choose image" value="" alt="no profile">

                                        </div>
                                    </div>
                                </div>
                                <span class="invalid-txt" id="image-errors"></span>
                                @error('imageedit')
                                    <span class="invalid-txt image-error" role="alert">{{ $message }}</span> <br>
                                @enderror
                                
                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" name="nameedit" id="name_detail"
                                            placeholder="Full Name" value="{{ old('nameedit') }}">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                    </div>
                                    <span class="invalid-txt" id="name-errors"></span>
                                    @error('nameedit')
                                        <span class="invalid-txt name-error" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="email" class="form-control" name="emailedit" id='email_details'
                                            placeholder="Enter your email" value="{{ old('emailedit') }}">

                                        <span class="form-icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                    </div>
                                    <span class="invalid-txt" id="email-errors"></span>
                                    @error('emailedit')
                                        <span class="invalid-txt email-error" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="formfield">
                                        <input type="text" class="form-control" name="phoneedit" id='phone_number'
                                            placeholder="Enter your phone number" value="{{ old('phoneedit') }}">
                                        <span class="form-icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                    </div>
                                    <span class="invalid-txt" id="phone-errors"></span>
                                    @error('phoneedit')
                                        <span class="invalid-txt phone-error" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div id="errorMessage"></div>
                            {{-- <div class="alert alert-success alert-dismissible fade show" role="alert" id="errorMessage"> </div> --}}

                            <button type="submit" class="button primary-btn full-btn edit"
                                id="editbutton">Update</button>

                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <!-- SweetAlert CDN link -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    
    {{-- for delete user --}}
    <script>
        $(document).ready(function() {
            $('.delete-user').on('click', function() {
                var userId = $(this).data('user-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete this user.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('dispatchers.delete') }}',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": userId,
                            },
                            success: function(response) {
                                console.log(response.successDelete);

                                if (response.successDelete && response.successDelete !==
                                    "") {
                                    Swal.fire({
                                        title: "Delete!",
                                        text: "The deletion was successful.",
                                        icon: "success"
                                    }).then((result) => {
                                        if (result.isConfirmed || result
                                            .isDismissed) {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });
    </script>

    {{-- for fetch data for edit --}}
    <script>
        $(document).ready(function() {
            $('.edit-user').on('click', function(event) {
                event.preventDefault();
                $('#name-errors').text('');
                $('#email-errors').text('');
                $('#phone-errors').text('');
                $('#image-errors').text('');
                // ... (other error resetting logic)
                var userId = $(this).data('user-id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('dispatchers.fetchdata') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": userId,
                    },
                    success: function(response) {
                        
                        console.log(response.user.name);
                        var editUrl = '{{ route('dispatchers.update', ['id' => '']) }}/' + (response.user.id ?? 0);

                        $('#editUserId').val(response.user.id);
                        $('#email_details').val(response.user.email);
                        $('#name_detail').val(response.user.name);
                        $('#phone_number').val(response.userDetails.phone_number);
                        // $('#input-file').val(response.user.profile_path);

                        // Setting image src and handling if it's not available
                        var imagePath = response.user.profile_path ? '{{ asset('storage/') }}' + '/' + response.user.profile_path : '{{ asset('assets/images/table-img1.png') }}';
                        $('#image_profile').attr('src', imagePath);

                        // Show the modal after setting the values
                        // $('#dispatcherEdit').modal('show');
                    },
                    error: function(xhr, status, error) {

                        console.log(error);
                    }
                });
            });
        });

    </script>

    {{-- disable modal --}}
    {{-- <script>
        $(document).ready(function() {
            $('.popup-btn-close').on('click', function(event) {
                location.reload();
                // window.location.href = data.redirect;

            });
        });
    </script> --}}

    {{-- update user  --}}
  
    <script>
        $(document).ready(function() {
        $('#editbutton').on('click', function(event) {
            event.preventDefault();

            var userId = $('#editUserId').val();
            var Name = $('#name_detail').val();
            var Phone = $('#phone_number').val();
            var Email = $('#email_details').val();
            var Imagepath = $('#input-file').val();

            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('user_id', userId);
            formData.append('nameedit', Name);
            formData.append('emailedit', Email);
            formData.append('phoneedit', Phone);
            formData.append('imageedit', Imagepath);

            $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                url: '{{ route('dispatchers.update') }}',
                data: formData,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(response) {
                    var successMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        response.successUpdate +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>';

                    $('#registerformedit').prepend(successMessage);

                    setTimeout(function() {
                        $('.alert.alert-success').alert('close');
                    }, 3000);

                    $('#name-errors').text('');
                    $('#email-errors').text('');
                    $('#phone-errors').text('');
                    $('#image-errors').text('');
                },
                error: function(xhr, status, error) {
                    $('#name-errors').text('');
                    $('#email-errors').text('');
                    $('#phone-errors').text('');
                    $('#image-errors').text('');
                    var errors = xhr.responseJSON;

                    $('#name-errors').text(errors.errorvalidation ? errors.errorvalidation.nameedit : '');
                    $('#email-errors').text(errors.errorvalidation ? errors.errorvalidation.emailedit : '');
                    $('#phone-errors').text(errors.errorvalidation ? errors.errorvalidation.phoneedit : '');
                    $('#image-errors').text(errors.errorvalidation ? errors.errorvalidation.imageedit : '');
                }
            });
        });
    });

    </script>


    {{-- searching Button Submit --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formSubmitBtn = document.getElementById('form_submit');
            const searchForm = document.getElementById('searchdata');

            formSubmitBtn.addEventListener('click', function (e) {
                e.preventDefault(); 

                // Submit the form
                searchForm.submit();
            });
        });
    </script>

    {{-- Add validation for User --}}
    <script>
        $(document).ready(function() {

            var validator = $("#registerform").validate({
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
                        digits: true,
                        minlength: 10,

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
                        minlength: "must be at least 10 digits",
                        digits: "Please enter only digits",
                    }
                
                }

                
            });
            $('body').on('click', function (e) {
              validator.resetForm(); // Resetting the form validation
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            setTimeout(function() {
                $("#successAlert").alert('close');
            }, 3000);
        });
    </script>

    {{-- add class in pagination  --}}
    <script>
        // Get all elements with class "pagination-no"
        const paginationNumbers = document.querySelectorAll('.pagination-no');
        
        // Loop through each pagination number
        paginationNumbers.forEach(paginationNumber => {
            paginationNumber.addEventListener('click', function() {
                // Remove "active" class from all pagination numbers
                paginationNumbers.forEach(item => {
                    item.classList.remove('active');
                });

                // Add "active" class to the clicked pagination number
                this.classList.add('active');
                });
            });
    </script>

    {{-- validation for Update user--}}
    <script>
        $(document).ready(function() {
            var validatoredit = $("#registerformedit").validate({
                rules: {
                    nameedit: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        pattern: /^[a-zA-Z]+(?: [a-zA-Z]+)*$/
                    },
                    emailedit: {
                        required: true,
                        pattern: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    },
                    phoneedit: {
                        required: true,
                    }
                },
                messages: {
                    nameedit: {
                        required: 'Name is required',
                        minlength: 'Name must be 3-50 characters long',
                        maxlength: 'Name must be 3-50 characters long',
                        pattern: 'Name contains alphabets only & space',
                    },
                    emailedit: {
                        required: 'Email is required',
                        pattern: 'Invalid email address',
                    },
                    phoneedit: {
                        required: 'Phone is required',
                    }
                }
            });

            
        });

    </script>
    

    {{-- {{ display modal if any error in form,add user}} --}}
    <script>
        $(document).ready(function() {
            $('.invalid-txt').each(function() {
                var errorMessage = $(this).text().trim();
                
                if (errorMessage.length > 0) {
                    // Show the modal
                    $('#dispatchersManagementPopup').modal('show');
                    // Exit the loop after the first error message is found
                    return false;
                }
                
            });
            // $('#dispatchersManagementPopup').on('hidden.bs.modal', function (e) {
            //     $('#dispatchersManagementPopup')[0].reset();
            // });
               
        });
            
    </script>
    
@stop
