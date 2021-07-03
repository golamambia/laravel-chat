@extends('admin.layout.master')

@section('content')
<!-- Content Row -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
  </div>
  <div class="card-body">
  <form class="user" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input id="name" type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="user name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email"  placeholder="Email Address">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-sm-6">                    
        <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation"  autocomplete="new-password"  placeholder="Repeat Password">
      </div>
    </div>
    <div class="form-group">
      <input id="avatar" type="file" class="@error('avatar') is-invalid @enderror" name="avatar">
        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary  btn-user ">
        {{ __('Submit') }}
    </button>
  </form>
  </div>
</div>

<!-- Content Row -->
@endsection
