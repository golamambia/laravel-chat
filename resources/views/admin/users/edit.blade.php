@extends('admin.layout.master')

@section('content')
<!-- Content Row -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
  </div>
  <div class="card-body">
  <form class="user" method="POST" action="{{ route('admin.users.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input id="name" type="text" class="form-control  form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}"  autocomplete="name" autofocus placeholder="user name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}"  autocomplete="email"  placeholder="Email Address">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
      <label for="">Status:</label>

      <select id="is_active" name="is_active">
        <option value="1" <?php echo ($users->is_active == 1) ? 'selected' : '';?> >Active</option>
        <option value="0" <?php echo ($users->is_active == 0) ? 'selected' : '';?>>In-Active</option>
      </select>
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
        @if($users->avatar != '')                
          <img src="{{ URL('/images/users/'.$users->avatar) }}" height="250" width="250" class="img-thumbnail width-100">
        @else
          <img src="{{ URL('/images/users/img_avatar1.png') }}" height="250" width="250" class="img-thumbnail width-100">>
        @endif
      </div>
    </div>
    <input type ="hidden" name="action" value="{{ $users->id }}">
    <button type="submit" class="btn btn-primary btn-user pull">
        {{ __('Submit') }}
    </button>
  </form>
  </div>
</div>

<!-- Content Row -->
@endsection
