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
            Change Password
        </div>
        
        <div class="content">
            <div class="info">
                <strong><small>
                        <p>Change your privacy settings according to your likeness.</p>
                    </small></strong>
            </div>
            <form action="changePrivacy" id="privacyForm" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Account Privacy Status</label>
                            <select class="form-select" name="privacy_status" aria-label="Default select example">
                                <option value="0" {{ Auth::user()->privacy_status === 0 ? 'selected' : '' }}>Private</option>
                                <option value="1" {{ Auth::user()->privacy_status === 1 ? 'selected' : '' }}>Public</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Show Last Active</label>
                            <select class="form-select" name="show_last_login" aria-label="Default select example">
                                <option value="0" {{ Auth::user()->show_last_login === 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ Auth::user()->show_last_login === 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Block Messages From Male Users</label>
                            <select class="form-select" name="block_male_msg" aria-label="Default select example">
                                <option value="0" {{ Auth::user()->block_male_msg === 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ Auth::user()->block_male_msg === 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Block Messages From Female Users</label>
                            <select class="form-select" name="block_female_msg" aria-label="Default select example">
                                <option value="0" {{ Auth::user()->block_female_msg === 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ Auth::user()->block_female_msg === 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-input-box">
                            <label for="">Block Messages From Transgener Users</label>
                            <select class="form-select" name="block_trans_msg" aria-label="Default select example">
                                <option value="0" {{ Auth::user()->block_trans_msg === 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ Auth::user()->block_trans_msg === 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <div class="buttons  mt-30">
        <button type="submit" class="custom-button">Save Changes</button>
        <a class="custom-button2" style="cursor: pointer;" onclick="history.back()">Discard All</a>
        </form>
    </div>
</div>

@endsection