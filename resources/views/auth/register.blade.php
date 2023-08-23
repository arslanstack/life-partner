@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('register') }}">
  @csrf
  <h4 class="content-title">Create Your Account</h4>

  <div class="form-group">
    <label for="">I am*</label>
    <div class="option">
      <div class="s-input mr-3">
        <input type="radio" name="financial_support" id="self" value="0" required><label for="self">willing to give financial support</label>
      </div>
      <div class="s-input mr-3">
        <input type="radio" name="financial_support" id="dependant" value="1"><label for="dependant">need financial support</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="">Looking for a*</label>
    <div class="option">
      <div class="s-input mr-3">
        <input type="radio" name="interestedin" id="man2" value="Male" required><label for="man2">Man</label>
      </div>
      <div class="s-input mr-3">
        <input type="radio" name="interestedin" id="women2" value="Female"><label for="women2">Woman</label>
      </div>
      <div class="s-input">
        <input type="radio" name="interestedin" id="trans2" value="Transgender"><label for="trans2">Transgender</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="">Email Address*</label>
    <input id="email" type="email" class="my-form-control form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <button class="custom-button" type="submit">Sign Up</button>
</form>
@endsection