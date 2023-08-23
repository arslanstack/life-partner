@extends('layouts.adminpanel')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
    <strong>Success!</strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading mt-2">

        @if(isPending($changeLog->user_id))
        <div class="col-lg-12">
            <h2>Review Profile Update</h2>
        </div>
        <div class="col-12">
            <div class="btn btn-sm btn-success" onclick="confirmApprove()" style="padding: 0.25rem 1.5rem !important;">Approve</div>
            <div class="btn btn-sm btn-danger" onclick="confirmReject()" style="padding: 0.25rem 1.5rem !important;">Reject</div>
            <form action="{{ route('admin.approveChange') }}" method="POST" id="approveForm">
                @csrf 
                <input type="text" name="id" value="{{$changeLog->id}}" hidden>
                <button type="submit" hidden>Approve</button>
            </form>
            <form action="{{ route('admin.rejectChange') }}" method="POST" id="rejectForm">
                @csrf 
                <input type="text" name="id" value="{{$changeLog->id}}" hidden>
                <button type="submit" hidden>Reject</button>
            </form>
        </div>
        @else
        <div class="col-lg-12">
            <h2>Profile Update Log</h2><span class="{{$changeLog->status === 'approved' ? 'badge bg-primary' : 'badge bg-danger'}}">{{$changeLog->status}}</span>

        </div>
        @endif
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="row animated fadeInRight mt-2">
                <div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 class="bg-light text-success">Current Profile</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-fluid" id="dpShowLabel" style="cursor: pointer; display: block;margin-left: auto;margin-right: auto;width: 250px; height: 250px;" src="{{asset('uploads/' . ($user->profile_image ?? 'avatar.jpg'))}}">
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
                                <div class="hr-line-dashed"></div>
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
                                                <label for="" class="col-form-label">Address</label>
                                                <textarea class="form-control" readonly name="address">{{$user->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row animated fadeInRight mt-2">
                <div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 class="bg-light text-danger">@if($changeLog->status == 'pending' || $changeLog->status == 'rejected')Proposed Updated Profile @elseif($changeLog->status == 'approved') Previous Profile Data @endif</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-fluid" id="dpShowLabel" style="cursor: pointer; display: block;margin-left: auto;margin-right: auto;width: 250px; height: 250px;" src="{{asset('uploads/' . ($profileData->profile_image ?? 'avatar.jpg'))}}">
                            </div>
                            <div class="ibox-content profile-content">
                                @if($user->status === 1) <span class="badge bg-primary">Active</span> @else <span class="badge bg-warning">Inactive</span> @endif <span></span>@if($user->verify_status === 1) <span class="badge bg-success">Verified</span> @else <span class="badge bg-danger">Not verified</span> @endif <span></span>
                                <h3 class="mt-3"><strong>{{$profileData->first_name . ' ' . $profileData->last_name}} </strong><br><small>{{'@' . $profileData->username}}</small></h3 class="mt-3">
                                <p><i class="fa fa-map-marker"></i> {{$profileData->city}}, {{ $profileData->country}}
                                    <small>
                                        <strong>Last active: </strong>
                                        @php
                                        $datetime = \Carbon\Carbon::createFromDate($user->last_login);
                                        echo $datetime->diffForHumans();
                                        @endphp
                                    </small>
                                </p>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <h4>Personal Details</h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4"><label for="" class="col-form-label">First Name</label><input readonly type="text" name="first_name" value="{{$profileData->first_name}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Last Name</label><input readonly type="text" name="last_name" value="{{$profileData->last_name}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Username</label><input readonly type="text" name="username" value="{{$profileData->username}}" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4"><label for="" class="col-form-label">Email</label><input type="text" readonly name="email" value="{{$profileData->email}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Marital Status</label><input type="text" name="verify_status" value="{{$profileData->marital_status === 1 ? 'Married' : 'Single'}}" class="form-control" readonly></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">I am</label><input readonly type="text" value="{{$user->iam}}" class="form-control"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4"><label for="" class="col-form-label">Gender</label> <input type="text" name="gender" value="{{ $profileData->gender === 0 ? 'Male' : ($profileData->gender === 1 ? 'Female' : 'Trans') }}" class="form-control" readonly>
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
                                                <input type="text " class="form-control" value="{{$profileData->child}}" readonly>
                                            </div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Date of Birth</label>
                                                <input type="date" class="form-control" name="dob" value="{{$profileData->dob}}" readonly>
                                            </div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Age</label>
                                                <input type="text" class="form-control" name="age" value="{{$profileData->age}}" readonly>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-12"><label for="" class="col-form-label">About Me</label><textarea readonly class="form-control" name="about_me">{{$profileData->about_me}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="form-group row">
                                    <h4>Physical Details</h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4"><label for="" class="col-form-label">Height</label><input type="text" name="height" readonly value="{{$profileData->height}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Weight</label><input type="text" name="weight" readonly value="{{$profileData->weight}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Body Type</label>
                                                <input type="text" name="body_type" value="{{$profileData->body_type === '0' ? 'Small' : ($profileData->body_type === '1' ? 'Average' : ($profileData->body_type === '2' ? 'Aethletic' : 'Large'))}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                                <div class="form-group row">
                                    <h4>Geo-location Details</h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4"><label for="" class="col-form-label">City</label><input readonly type="text" name="city" value="{{$profileData->city}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">State</label><input readonly type="text" name="state" value="{{$profileData->state}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Zip Code</label><input readonly type="text" name="zipcode" value="{{$profileData->zipcode}}" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="" class="col-form-label">Country</label>
                                                <input readonly type="text" name="country" value="{{$profileData->country}}" class="form-control">
                                            </div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Latitude</label><input readonly type="text" name="latitude" value="{{$profileData->latitude}}" class="form-control"></div>
                                            <div class="col-md-4"><label for="" class="col-form-label">Longitude</label><input readonly type="text" name="longitude" value="{{$profileData->longitude}}" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="" class="col-form-label">Address</label>
                                                <textarea class="form-control" readonly name="address">{{$profileData->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading mb-5">

        @if(isPending($changeLog->user_id))
        <div class="col-lg-12">
            <h2>Review Profile Update</h2>
        </div>
        <div class="col-12">
        <div class="btn btn-sm btn-success" onclick="confirmApprove()" style="padding: 0.25rem 1.5rem !important;">Approve</div>
            <div class="btn btn-sm btn-danger" onclick="confirmReject()" style="padding: 0.25rem 1.5rem !important;">Reject</div>
        </div>
        @else
        <div class="col-lg-12">
            <h2>Profile Update Log</h2><span class="{{$changeLog->status === 'approved' ? 'badge bg-primary' : 'badge bg-danger'}}">{{$changeLog->status}}</span>
        </div>
        @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmApprove() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'User profile will be updated with latest data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, approve it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('approveForm').submit();
            }
        });
    }
    function confirmReject() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'User profile updation request would be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, reject it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('rejectForm').submit();
            }
        });
    }
</script>
@endsection