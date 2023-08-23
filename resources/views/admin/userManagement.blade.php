@extends('layouts.adminpanel')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
    <strong>Success!</strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>User Records</h5>

            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="usersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verification</th>
                                <th>Status</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="gradeX" style="cursor: pointer;">
                                <td>{{$loop->iteration}}</td>
                                <td><img style="width: 30px; height: 30px;" src="{{asset('uploads/' . ($user->profile_image ?? 'avatar.jpg'))}}" alt=""> {{' ' .$user->first_name . ' ' . $user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td> @if($user->verify_status === 1) <span class="badge bg-success">Verified</span> @else <span class="badge bg-danger">Not verified</span> @endif</td>
                                <td> @if($user->status === 1) <span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">Inactive</span> @endif</td>
                                <td class="">
                                    <a href="user-details/{{$user->unique_id}}" class="btn btn-sm btn-success"><i class="fa fa-id-card-o"> </i> Perview</a>
                                    
                                    @if($user->status == 0)
                                        <a class="btn btn-primary btn-sm btn-block" onclick="confirmUnblock('{{$user->id}}')">
                                            <i class="fa fa-unlock"> </i> Unblock
                                        </a> 
                                    @elseif($user->status == 1)
                                        <a class="btn btn-warning btn-sm btn-block" onclick="confirmBlock('{{$user->id}}')">
                                            <i class="fa fa-lock"> </i> Block
                                        </a> 
                                    @endif
                                    <a class="btn btn-danger btn-sm btn-block" onclick="confirmDelete('{{$user->id}}')"><i class="fa fa-trash"> </i> Delete</a>
                                    <form  action="{{ route('admin.unblockUser') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{$user->id}}" hidden>
                                        <button id="unblockUserForm{{$user->id}}" hidden type="submit"></button>
                                    </form>
                                    <form  action="{{ route('admin.blockUser') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{$user->id}}" hidden>
                                        <button id="blockUserForm{{$user->id}}" hidden type="submit"></button>
                                    </form>
                                    <form  action="{{ route('admin.deleteUser') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{$user->id}}" hidden>
                                        <button id="deleteUserForm{{$user->id}}" hidden type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script><!-- DataTables -->

<script>
    // $(document).ready(function() {
    //     $('table tr').click(function() {
    //         console.log("clicked");
    //         var href = $(this).find("a").attr("href");
    //         if (href) {
    //             window.open(href, '_blank');
    //             console.log("opened");
    //         }
    //         console.log("Tried to open");

    //     });
    // });
</script>
<!-- Mainly scripts -->
<!-- jQuery -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./../adminpanel/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="./../adminpanel/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<!-- Page-Level Scripts -->
<script>
    // Upgrade button class name
    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 50,
            responsive: true,
        });

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete($userId) {
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
                document.getElementById('deleteUserForm' + $userId).click();
            }
        });
    }
    function confirmBlock($userId) {
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
                document.getElementById('blockUserForm' + $userId).click();
            }
        });
    }
    function confirmUnblock($userId) {
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
                document.getElementById('unblockUserForm' + $userId).click();
            }
        });
    }
</script>
@endsection