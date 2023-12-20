@extends('layouts.apna')

@section('content')

    <div class="db-content-main">
        <div class="db-edit-content-box">
            <div class="driver-left-edit-bx">
                <div class="db-heading-bx">
                    <h2>Profile</h2>
                </div>
                <div class="driver-edit-profile-wrapper">
                    <div class="driver-edit-box">
                        <div class="profile-edit-box">
                            <div class="upload-img">
                                <div class="main-profile-image-box">
                                    <img src="images/table-img1.png" class="main-profile-image">
                                    <div class="file file--upload">
                                        <label for="input-file">
                                            <i class="fa-solid fa-camera"></i>
                                        </label>
                                        <input id="input-file" type="file">
                                    </div>
                                
                                </div>
                            </div>
                            <div class="edit-input-bx">
                                <div class="edit-input-bx">
                                <form class="profile-edit-form" action="{{ route('updateProfile') }}" method="POST">
                                    @csrf
                                    <div class="input-box">
                                        <div class="form-group">
                                            <div class="formfield">
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                                                <span class="form-icon">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                            </div>
                                            @error('name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="formfield">
                                                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                                <span class="form-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                            </div>
                                            @error('email')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                        <!-- Other input fields -->

                                        <div class="form-group upload-file">
                                            <label for="upload-file">
                                                <img src="images/lisence.png" alt="">
                                                <div class="upload-file-detail">
                                                    <h3>Driving Licence</h3>
                                                    <a href="#">Replace File</a>
                                                </div>
                                            </label>
                                            <input type="file" id="upload-file" name="license">
                                        </div>

                                        <button type="submit" class="button primary-btn full-btn">Save</button>
                                    </div>
                                </form>
                            </div>

                            </div>
                            <div class="update-lis-bx">

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
        
@endsection