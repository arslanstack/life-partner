<!DOCTYPE html>
<html>
<!-- Layout for admin side panel -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Life Partner | Admin</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../adminpanel/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../../adminpanel/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet ALert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Gritter -->
    <link href="../../adminpanel/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../../adminpanel/css/animate.css" rel="stylesheet">
    <link href="../../adminpanel/css/style.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }

        .dataTables_filter input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" style="width: 48px; height: 48px;" src="{{asset('uploads/' . (Auth()->user()->profile->dp ?? 'avatar.jpg'))}}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                                <span class="text-muted text-xs block">Administrator <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile">Profile</a></li>
                                <!-- <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li> -->
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            LP
                        </div>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.home' ? "class=active" : '' }}>
                        <a href="/admin/home"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.userManagement' ? "class=active" : '' }}>
                        <a href="/admin/userManagement"><i class="fa fa-user-o"></i> <span class="nav-label">User Management</span></a>
                    </li>
                    <li {{ request()->is('admin/user-details*') ? 'class=active' : 'style=display:none' }}>
                        <a href="#" onClick="window.location.reload();return false;"><i class="fa fa-user-circle"></i><span class="nav-label">User Profile</span></a>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.approvals' ? "class=active" : '' }}>
                        <a href="/admin/approvals"><i class="fa fa-id-card-o"></i> <span class="nav-label">Profile Approvals</span></a>
                    </li>
                    <li {{ request()->is('admin/approval_details*') ? 'class=active' : 'style=display:none' }}>
                        <a href="#" onClick="window.location.reload();return false;"><i class="fa fa-table"></i><span class="nav-label">Approval Log</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to Life Partner Admin Panel.</span>
                        </li>



                        <li>
                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
            <div class="footer">
                <div class="float-right" style="cursor: pointer;" onclick="document.getElementById('logout-form').submit();">
                    Logout from<strong> Admin?</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Life Partner &copy; 2023
                </div>
            </div>
        </div>

    </div>

    <!-- Mainly scripts -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../adminpanel/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../adminpanel/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Mainly scripts -->
    <script src="../../adminpanel/js/popper.min.js"></script>
    <script src="../../adminpanel/js/bootstrap.js"></script>
    <script src="../../adminpanel/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../adminpanel/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../../adminpanel/js/plugins/flot/jquery.flot.js"></script>
    <script src="../../adminpanel/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../../adminpanel/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../../adminpanel/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../../adminpanel/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../../adminpanel/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../../adminpanel/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../adminpanel/js/inspinia.js"></script>
    <script src="../../adminpanel/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../../adminpanel/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../../adminpanel/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../../adminpanel/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../../adminpanel/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../../adminpanel/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="../../adminpanel/js/plugins/toastr/toastr.min.js"></script>

    <script>
        // document ready jquery
        $(document).ready(function() {
            $(':input[readonly]').css({
                'background-color': '#ffffff'
            });
            $(':select[disabled]').css({
                'background-color': '#ffffff'
            });
        });
    </script>

</body>

</html>