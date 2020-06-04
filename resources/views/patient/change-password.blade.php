@extends('patient.app')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
<form id="form-change-password" role="form" method="POST" action="{{ route('password.post') }}" novalidate class="form-horizontal">
  <div class="col-md-9">             
    <label for="current-password" class="col-sm-8 control-label">Current Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
      </div>
    </div>
    <label for="password" class="col-sm-8 control-label">New Password</label>
    <div class="col-sm-8">
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="new-password" placeholder="Password">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>



</div>



@endsection
