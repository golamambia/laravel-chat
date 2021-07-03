@extends('admin.layout.master')

@section('content')
<!-- Content Row -->
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ trans(session('message'))}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif 
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
  </div>
  <div class="card-body">
  <form class="user" method="POST" action="{{ route('admin.profiles.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input id="name" type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $profiles->name }}"  autocomplete="name" autofocus placeholder="user name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $profiles->email }}"  autocomplete="email"  placeholder="Email Address">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
      <input id="avatar" type="file" class="@error('avatar') is-invalid @enderror" name="avatar">
        @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-sm-6">
            @if($profiles->avatar != '')
            <img class="img-profile rounded-circle" src="{{ URL('/images/users/'.$profiles->avatar) }}" height="150" width="150">
            @else
            <p data-letters="{{strtoupper(substr($profiles->name, 0, 1))}}"></p>
            @endif                    
      </div>
    </div>

    <div class="form-group">
        <label>Chat Color</label>
        <input type="color" class="form-control form-control-line" name="chat_color" id="chat_color" value="{{ $profiles->chat_color}}">   
    </div>
    <input type ="hidden" name="action" value="{{ $profiles->id }}">
    <button type="submit" class="btn btn-primary btn-user pull">
        {{ __('Submit') }}
    </button>
  </form>
  </div>
</div>

<!-- Content Row -->
@endsection

