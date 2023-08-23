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
                <h5>Your Profile</h5>
            </div>
            
        </div>
    </div>
</div>

@endsection