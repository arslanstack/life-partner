@extends('layouts.adminpanel')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
    <strong>Success!</strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row animated fadeInRight mt-2">
    <div class="col-md-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User Profile</h5>
            </div>
            <div>
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-fluid" id="dpShowLabel" style="cursor: pointer; display: block;margin-left: auto;margin-right: auto;width: 50%; height: 50%;" src="{{asset('uploads/' . ($user->profile_image ?? 'avatar.jpg'))}}">
                </div>
                <div class="ibox-content profile-content">
                    @if($user->status === 1) <span class="badge bg-primary">Active</span> @else <span class="badge bg-warning">Inactive</span> @endif <span></span>@if($user->verify_status === 1) <span class="badge bg-success">Verified</span> @else <span class="badge bg-danger">Not verified</span> @endif <span></span>
                    <h3 class="mt-3"><strong>{{$user->first_name . ' ' . $user->last_name}} </strong><br><small>{{'@' . $user->username}}</small></h3 class="mt-3">
                    <p><i class="fa fa-map-marker"></i> {{$user->city}}, {{ $user->country}}
                        <small>
                            <strong>Last active: </strong>
                            @php
                            $datetime = \Carbon\Carbon::createFromDate($user->last_login);
                            echo $datetime->diffForHumans();
                            @endphp
                        </small>
                    </p>
                    <h5>
                        About me
                    </h5>
                    <p>
                        {{ $user->about_me}}
                    </p>
                    <div class="row m-t-lg">
                        <div class="col-md-4">
                            <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>169</strong> Posts</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                            <h5><strong>28</strong> Likes</h5>
                        </div>
                        <div class="col-md-4">
                            <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                            <h5><strong>240</strong> Reports</h5>
                        </div>
                    </div>
                    <div class="user-button">
                        <div class="row mt-3">
                            <div class="col-md-4">
                                @if($user->status == 0)
                                <form id="unblockUserForm" action="{{ route('admin.unblockUser') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{$user->id}}" hidden>
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="confirmUnblock()"><i class="fa fa-unlock"></i> Unblock</button>
                                </form>
                                @elseif($user->status == 1)
                                <form id="blockUserForm" action="{{ route('admin.blockUser') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{$user->id}}" hidden>
                                    <button type="button" class="btn btn-warning btn-sm btn-block" onclick="confirmBlock()"><i class="fa fa-lock"></i> Block</button>
                                </form>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <form id="deleteUserForm" action="{{ route('admin.deleteUser') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{$user->id}}" hidden>
                                    <button type="button" class="btn btn-danger btn-sm btn-block px-4" onclick="confirmDelete()"><i class="fa fa-trash"></i> Delete Profile</button>                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User Details</h5>
            </div>
            <div class="ibox-content">



                <div class="form-group row">
                    <h4>Personal Details</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">First Name</label><input readonly type="text" name="first_name" value="{{$user->first_name}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Last Name</label><input readonly type="text" name="last_name" value="{{$user->last_name}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Username</label><input readonly type="text" name="username" value="{{$user->username}}" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Email</label><input type="text" readonly name="email" value="{{$user->email}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Marital Status</label><input type="text" name="marital_status" value="{{$user->marital_status === 1 ? 'Married' : 'Single'}}" class="form-control" readonly></div>
                            <div class="col-md-4"><label for="" class="col-form-label">I am</label><input readonly type="text" value="{{$user->iam}}" class="form-control"></div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Gender</label> <input type="text" name="gender" value="{{ $user->gender === 0 ? 'Male' : ($user->gender === 1 ? 'Female' : 'Trans') }}" class="form-control" readonly>
                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Interested In</label> <input type="text" name="interestedin" value="{{$user->interestedin}}" class="form-control" readonly></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Financial Support</label>
                                <input type="text" name="financial_support" value="{{$user->financial_support === 0 ? 'Willing to give' : 'Needed'}}" class="form-control" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">


                            <div class="col-md-4"><label for="" class="col-form-label">Childern</label>
                                <input type="text " class="form-control" value="{{$user->child}}" readonly>
                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{$user->dob}}" readonly>
                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Age</label>
                                <input type="text" class="form-control" name="age" value="{{$user->age}}" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12"><label for="" class="col-form-label">About Me</label><textarea readonly class="form-control" name="about_me">{{$user->about_me}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                </div>
                <div class="form-group row">
                    <h4>Physical Details</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Height</label><input type="text" name="height" readonly value="{{$user->height}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Weight</label><input type="text" name="weight" readonly value="{{$user->weight}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Body Type</label>
                                <input type="text" name="body_type" value="{{ $user->body_type === 0 ? 'Small' : ($user->body_type === 1 ? 'Average' : ($user->body_type === 2 ? 'Aethletic' : ($user->body_type === 3 ? 'Large' : ''))) }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                </div>
                <div class="form-group row">
                    <h4>Geo-location Details</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">City</label><input readonly type="text" name="city" value="{{$user->city}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">State</label><input readonly type="text" name="state" value="{{$user->state}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Zip Code</label><input readonly type="text" name="zipcode" value="{{$user->zipcode}}" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="col-form-label">Country</label>
                                <input readonly type="text" name="country" value="{{$user->country}}" class="form-control">
                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Latitude</label><input readonly type="text" name="latitude" value="{{$user->latitude}}" class="form-control"></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Longitude</label><input readonly type="text" name="longitude" value="{{$user->longitude}}" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="col-form-label">Timezone</label>
                                <input readonly type="text" name="timezone" value="{{$user->timezone}}" class="form-control">

                            </div>
                            <div class="col-md-12">
                                <label for="" class="col-form-label">Address</label>
                                <textarea class="form-control" readonly name="address">{{$user->address}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                </div>
                <div class="form-group row">
                    <h4>Preferences</h4>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="col-form-label">Membership Type</label>
                                <input type="text" name="membership_type" value="{{ $user->membership_type === 0 || $user->membership_type === NULL ? 'Free' : 'Premium' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Membership Start Date</label><input type="date" name="membership_start" value="{{$user->membership_start}}" class="form-control" readonly></div>
                            <div class="col-md-4"><label for="" class="col-form-label">Membership End Date</label><input type="date" name="membership_start" value="{{$user->membership_start}}" class="form-control" readonly></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Membership Status</label>
                                <input type="text" name="membership_status" value="{{ $user->membership_status === NULL ? 'Not Applicable' : ($user->membership_status === 0 ? 'Active' : 'Inactive') }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Privacy Status</label>
                                <input type="text" name="privacy_status" value="{{ $user->privacy_status === 0 || $user->privacy_status === NULL ? 'Public' : 'Private' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Show Last Login</label>
                                <input type="text" name="show_last_login" value="{{ $user->show_last_login === 0 || $user->show_last_login === NULL ? 'Yes' : 'No' }}" class="form-control" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Block Male Messages</label>
                                <input type="text" name="block_male_msg" value="{{ $user->block_male_msg === 0 || $user->block_male_msg === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Block Female Messages</label>
                                <input type="text" name="block_female_msg" value="{{ $user->block_female_msg === 0 || $user->block_female_msg === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Block Trans Messages</label>
                                <input type="text" name="block_trans_msg" value="{{ $user->block_trans_msg === 0 || $user->block_trans_msg === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Block All Emails</label>
                                <input type="text" name="block_all_email" value="{{ $user->block_all_email === 0 || $user->block_all_email === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>


                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Block Money Making Emails</label>
                                <input type="text" name="block_money_making_opp_emai" value="{{ $user->block_money_making_opp_emai === 0 || $user->block_money_making_opp_emai === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Block Local Events Emails</label>
                                <input type="text" name="block_local_event_meet_up_email" value="{{ $user->block_local_event_meet_up_email === 0 || $user->block_local_event_meet_up_email === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><label for="" class="col-form-label">Block Notification Emails</label>
                                <input type="text" name="block_like_favorite_email" value="{{ $user->block_like_favorite_email === 0 || $user->block_like_favorite_email === NULL ? 'No' : 'Yes' }}" class="form-control" readonly>

                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Account Created On</label>
                                <input type="datetime" value="{{$user->created_at}}" class="form-control" readonly>
                            </div>
                            <div class="col-md-4"><label for="" class="col-form-label">Last Profile Update</label>
                                <input type="datetime" value="{{$user->updated_at}}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                </div>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this user profile!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteUserForm').submit();
            }
        });
    }
    function confirmBlock() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will block/deactivate this profile!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, block user!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('blockUserForm').submit();
            }
        });
    }
    function confirmUnblock() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will unblock/activate this profile!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, unblock user!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('unblockUserForm').submit();
            }
        });
    }
</script>
@endsection