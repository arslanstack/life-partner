@extends('layouts.settings')
@section('content')
@php
$userdata = ProfileData(Auth::id());
@endphp
<div class="col-xl-8 col-md-7 ">
    <div class="page-title">
        Profile Settings
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <strong>Success!</strong> {{session('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(isPending(Auth::id()))
    <div class="alert alert-warning alert-dismissible fade show " role="alert">
        <strong>Alert! </strong> Your recent profile changes are pending for review by admin.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="profile-about-box">
                <div class="top-bg"></div>
                <div class="p-inner-content">
                    <div class="profile-img">
                        <form action="editProfile" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="dp"><img src="{{asset('uploads/' . ($userdata->profile_image ?? 'avatar.jpg'))}}" id="dpShowLabel" style="width: 120px; height: 120px; border-radius: 100%;" alt=""></label>
                            <input type="file" id="dp" name="profile_image" class="visually-hidden" accept="image/*" hidden onchange="imageName(this)">
                            <div class="active-online"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label for="dp">
                <div class="up-photo-card mb-30">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="content">
                        <h4>
                            Change Display Picture
                        </h4>
                        <span>
                            120x120p size minimum
                        </span>
                    </div>
                </div>
            </label>
        </div>
    </div>
    <div class="input-info-box mt-30">
        <div class="header">
            About your Profile
        </div>
        <div class="content">

            <div class="row">
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" id="name" name="first_name" value="{{$userdata->first_name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" id="name" name="last_name" value="{{$userdata->last_name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$userdata->email}}" readonly required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{$userdata->username}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Marital Status</label>
                        <select class="form-select" name="marital_status" aria-label="Default select example">
                            <option {{ $userdata->marital_status === NULL ? 'selected' : '' }} disabled>Please Select</option>
                            <option value="0" {{ $userdata->marital_status === 0 ? 'selected' : '' }}>Single</option>
                            <option value="1" {{ $userdata->marital_status === 1 ? 'selected' : '' }}>Married</option>
                            <option value="2" {{ $userdata->marital_status === 2 ? 'selected' : '' }}>Divorced</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Childern</label>
                        <select class="form-select" name="child" aria-label="Default select example">
                            <option {{ $userdata->child === NULL ? 'selected' : '' }} disabled>Please Select</option>
                            <option value="0" {{ $userdata->child === 0 ? 'selected' : '' }}>None</option>
                            <option value="1" {{ $userdata->child === 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $userdata->child === 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $userdata->child === 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $userdata->child === 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $userdata->child === 5 ? 'selected' : '' }}>5</option>
                            <option value="6" {{ $userdata->child === 6 ? 'selected' : '' }}>6</option>
                            <option value="7" {{ $userdata->child === 7 ? 'selected' : '' }}>7</option>
                            <option value="8" {{ $userdata->child === 8 ? 'selected' : '' }}>More than 7</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Gender</label>
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option {{ $userdata->gender === NULL ? 'selected' : '' }} disabled>Please Select</option>
                            <option value="0" {{ $userdata->gender === 0 ? 'selected' : '' }}>Male</option>
                            <option value="1" {{ $userdata->gender === 1 ? 'selected' : '' }}>Female</option>
                            <option value="2" {{ $userdata->gender === 2 ? 'selected' : '' }}>Transgender</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Birthday</label>
                        <input type="date" class="form-control" name="dob" value="{{($userdata->dob ?? '')}}">
                    </div>
                </div>
                <!--  -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="my-input-box">
                        <label for="">About Me</label>
                        <textarea class="form-control" id="bio" rows="1" name="about_me">{{($userdata->about_me ?? '')}}</textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="input-info-box mt-30">
        <div class="header">
            Physical Details
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Height (cm)</label>
                        <input type="text" class="form-control" id="name" name="height" value="{{$userdata->height}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="my-input-box">
                        <label for="">Weight (kg)</label>
                        <input type="text" class="form-control" id="name" name="weight" value="{{$userdata->weight}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="my-input-box">
                        <label for="">Body Type</label>
                        <select class="form-select" name="body_type" aria-label="Default select example">
                            <option {{ $userdata->body_type === NULL ? 'selected' : '' }} disabled>Please Select</option>
                            <option value="0" {{ $userdata->body_type === 0 ? 'selected' : '' }}>Small</option>
                            <option value="1" {{ $userdata->body_type === 1 ? 'selected' : '' }}>Average</option>
                            <option value="2" {{ $userdata->body_type === 2 ? 'selected' : '' }}>Aethletic</option>
                            <option value="3" {{ $userdata->body_type === 3 ? 'selected' : '' }}>Large</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="input-info-box mt-30">
        <div class="header">
            Location
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="my-input-box">
                        <label for="">Address</label>
                        <textarea class="form-control" id="address" rows="1" name="address">{{($userdata->address ?? '')}}</textarea>
                        <input type="hidden" value="{{$userdata->city}}" id="city" name="city">
                        <input type="hidden" value="{{$userdata->state}}" id="state" name="state">
                        <input type="hidden" value="{{$userdata->zipcode}}" id="zipcode" name="zipcode">
                        <input type="hidden" value="{{$userdata->country}}" id="country" name="country">
                        <input type="hidden" value="{{$userdata->latitude}}" id="latitude" name="latitude">
                        <input type="hidden" value="{{$userdata->longitude}}" id="longitude" name="longitude">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="buttons  mt-30">
        @if(isPending(Auth::id()) == true)
        <button type="button" class="custom-button disabled" disabled>Pending ..</button>
        @else
            <button type="submit" class="custom-button">Save Changes</button>
        @endif
        <a class="custom-button2" onclick="history.back()">Discard All</a>
        </form>
    </div>
</div>

<script>
    // Upon image slection in input change dp
    function imageName(input) {
        var dpShowLabel = document.getElementById('dpShowLabel');
        console.log(input.files[0]);
        dpShowLabel.src = URL.createObjectURL(input.files[0]);
    }
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function initMap() {
        const input = document.getElementById('address');
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setFields(['geometry', 'formatted_address', 'address_components']);

        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            const address = place.formatted_address;
            const city = getAddressComponent(place, 'locality');
            const state = getAddressComponent(place, 'administrative_area_level_1');
            const zipcode = getAddressComponent(place, 'postal_code');
            const country = getAddressComponent(place, 'country');
            const latitude = place.geometry.location.lat();
            const longitude = place.geometry.location.lng();




            document.getElementById('address').value = address;
            document.getElementById('city').value = city;
            document.getElementById('state').value = state;
            document.getElementById('zipcode').value = zipcode;
            document.getElementById('country').value = country;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;

        });
    }

    function getAddressComponent(place, type) {
        for (const component of place.address_components) {
            if (component.types.includes(type)) {
                return component.long_name;
            }
        }
        return '';
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy2l4KGGTm4cTqoSl6h8UAOAob87sHBsA&libraries=places&callback=initMap" async defer></script>

@endsection