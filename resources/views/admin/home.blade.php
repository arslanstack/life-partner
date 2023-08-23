@extends('layouts.adminpanel')
@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right">All Time</span>
                </div>
                <h5>Users</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{countUsers()}}</h1>
                <div class="stat-percent font-bold text-success">100% <i class="fa fa-bolt"></i></div>
                <small>Total users</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right">All Time</span>
                </div>
                <h5>Posts</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">189</h1>
                <div class="stat-percent font-bold text-info">100% <i class="fa fa-level-up"></i></div>
                <small>Total Posts</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-primary float-right">All Time</span>
                </div>
                <h5>Favourites</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">120</h1>
                <div class="stat-percent font-bold text-navy">100% <i class="fa fa-level-up"></i></div>
                <small>Total favourites</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-danger float-right">Total</span>
                </div>
                <h5>Reports</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">23</h1>
                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                <small>Total reports</small>
            </div>
        </div>
    </div>
</div>

@endsection