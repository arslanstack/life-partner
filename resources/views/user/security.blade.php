@extends('layouts.settings')
@section('content')
<div class="col-xl-8 col-md-7 ">
    <div class="page-title">
        Security Settings
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <strong>Success!</strong> {{session('success')}}.
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

    <div class="input-info-box mt-30">
        <div class="header">
            Change Password
        </div>
        <!-- alert with d-none -->
        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert">
            <strong>Attention!</strong> <span id="errorMsg"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="content">
            <div class="info">
                <strong><small>
                        <p>Change your password to something you can easily remember but hard for others to guess.</p>
                    </small></strong>
            </div>
            <form action="changePassword" id="passwordForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" id="c_password" name="c_password" required>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <div class="buttons  mt-30">
        <button type="button" onclick="validatePasswords()" class="custom-button">Save Changes</button>
        <a class="custom-button2" onclick="history.back()">Discard All</a>
        </form>
    </div>
</div>
<script>
    function validatePasswords() {
        var password = document.getElementById("password").value;
        var c_password = document.getElementById("c_password").value;
        if (password != c_password) {
            // alert("Passwords do not match");
            console.log("Passwords do not match");
            document.getElementById("errorMsg").innerHTML = "Passwords do not match";
            document.getElementById("errorMsg").parentElement.classList.remove("d-none");
            return;
        } else {
            if (password.length < 8) {
                // alert("Password must be at least 8 characters long");
                console.log("Password must be at least 8 characters long");
                document.getElementById("errorMsg").innerHTML = "Password must be at least 8 characters long";
                document.getElementById("errorMsg").parentElement.classList.remove("d-none");
                return;
            }
            document.getElementById("passwordForm").submit();
        }
        document.getElementById("passwordForm").submit();
    }
</script>
@endsection