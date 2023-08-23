<!DOCTYPE html>
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
            Subscription Management
        </div>

        <div class="content">
            <div class="info">
                <strong><small>
                        <p>Manage Your membership/subcsription according to your likeness.</p>
                    </small></strong>
            </div>
            <form action="subscriptionManagement" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Membership Type</label>
                            <select class="form-select" name="membership_type" aria-label="Default select example" disabled>
                                <option value="0" {{ Auth::user()->membership_type === 0 ? 'selected' : '' }}>Free</option>
                                <option value="1" {{ Auth::user()->membership_type === 1 ? 'selected' : '' }}>Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Membership Price</label>
                            <input type="text" value="{{Auth::user()->membership_price}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Membership Start</label>
                            <input type="date" value="{{Auth::user()->membership_start}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-input-box">
                            <label for="">Membership End</label>
                            <input type="date" value="{{Auth::user()->membership_end}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Membership Status</label>
                            <select class="form-select" name="membership_status" aria-label="Default select example" disabled>
                                <option value="0" {{ Auth::user()->membership_status === 0 ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ Auth::user()->membership_status === 1 ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <div class="buttons  mt-30">
        <button type="button" class="custom-button">Save Changes</button>
        <a class="custom-button2" style="cursor: pointer;" onclick="history.back()">Discard All</a>
        </form>
    </div>
</div>

@endsection