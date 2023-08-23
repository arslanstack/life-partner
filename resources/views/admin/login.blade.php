<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Partner | Admin</title>
    <link href="./../adminpanel/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../adminpanel/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="./../adminpanel/css/animate.css" rel="stylesheet">
    <link href="./../adminpanel/css/style.css" rel="stylesheet">

</head>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LP+</h1>

            </div>
            <div class="ibox-content">
                <h3>Welcome to Life Partner</h3>
                <p>Admin Panel</p>
                <p>Login in. To access dashboard</p>

                <form class="m-t" role="form" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <!-- if sessions roleError then show alert-->
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                        @php
                        Session::forget('error');
                        @endphp
                    </div>
                    @endif
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>


                </form>

                <p class="m-t">
                    <small>Life Partner Administration Panel &copy; 2023</small>
                </p>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 05:06:34 GMT -->

</html>