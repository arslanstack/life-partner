@extends('layouts.adminpanel')
@section('content')
<!-- @if(session('success'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
    <strong>Success!</strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Profile Update Logs</h5>

            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="usersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Update Time</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($changeLogs as $changeLog)
                            <tr class="gradeX" style="cursor: pointer;">
                                <td>{{$loop->iteration}}</td>
                                <td><img style="width: 30px; height: 30px;" src="{{asset('uploads/' . (userImage($changeLog->user_id) ?? 'avatar.jpg'))}}" alt=""> {{' ' . userName($changeLog->user_id)}}</td>
                                <td>{{userEmail($changeLog->user_id)}}</td>

                                <td> @if($changeLog->status === 'pending') <span class="badge bg-warning">Pending</span> @elseif($changeLog->status === 'rejected') <span class="badge bg-danger">Rejected</span> @elseif($changeLog->status === 'approved') <span class="badge bg-primary">Approved</span> @endif</td>
                                <td>{{$changeLog->created_at}}</td>
                                <td class="">
                                    <a href="approval_details/{{$changeLog->id}}" class="btn btn-sm btn-success"><i class="fa fa-id-card-o"> </i> Review</a>
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

</script>
@endsection