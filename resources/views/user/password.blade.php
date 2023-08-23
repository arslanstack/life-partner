@extends('layouts.settings')

@section('content')

<div class="col-xl-8 col-md-7 ">
    <div class="page-title">
        Account Security Settings
    </div>

    <div class="input-info-box mt-30">
        <div class="header">
            Change Password
        </div>
        <div class="content">
            @if(session('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{session('success')}}
                    </div>
                </div>
            </div>
            @endif
            <form action="changePassword" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger d-none" id="lengthAlert" role="alert">
                            Password must be at least 8 characters long.
                        </div>
                        <div class="alert alert-danger d-none" role="alert">
                            Password and confirm password do not match.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Your New Password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Confirm Your Password" required>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="buttons  mt-30">
        <button onclick="return validate()" class="custom-button">Save Changes</button>
        <button type="submit" id="submitBtn" class="custom-button" hidden>Save Changes</button>
        </form>
    </div>
</div>

<script>
    // Validate Password and Confirm Password
    function validate() {
        var password = document.getElementById("password").value;
        var c_password = document.getElementById("c_password").value;
        if (password.length < 8) {
            var element = document.getElementById("lengthAlert");
            element.innerHTML = "Password must be at least 8 characters long.";
            element.classList.remove("d-none");
            return false;
        } else if (password != c_password) {
            var element = document.getElementById("lengthAlert");
            element.innerHTML = "Password and confirm password do not match.";
            element.classList.remove("d-none");
            return false;
        }
        document.getElementById("submitBtn").click();
    }
</script>
@endsection