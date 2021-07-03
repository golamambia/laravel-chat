<?php 
   use App\Model\Chat_msg;
?>
@extends('front.layout.master')

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
    <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
  </div>
  <div class="col-md-12 row">
      @foreach($users as $key => $user)
        
          <?php 
            $active_msg = Chat_msg::where("sender_id",$user->id)->where("receiver_id",Auth::user()->id)->where('msg_read','0')->get();
          ?>
        <div class="col-md-3 border mb-4 py-md-3">
            <div class="">
              @if($user->avatar != '')
              <img class="img-thumbnail rounded mx-auto d-block" style="width: 100px; height: 100px;" src="{{ URL('/images/users/'.$user->avatar) }}">
              @else
              <img class="img-thumbnail rounded mx-auto d-block" style="width: 100px; height: 100px;" src="{{ URL('/images/users/img_avatar1.png') }}">
              @endif
            </div>
            </br>
            <div class="text-center">
              <div class="">
                <a href="{{ route('chat.user', ['id'=>$user->id])}}">{{ ucwords($user->name)}}</a>
              </div>
              <div class="">
                <a href="{{ route('chat.user', ['id'=>$user->id])}}" class="btn btn-info <?php echo (count($active_msg) > 0) ? 'btn-danger':'' ; ?>">Chat <i class="fa fa-comments" aria-hidden="true"></i></a>
              </div>
            </div>
        </div>
      @endforeach
  </div>
</div>

<!-- Content Row -->
@endsection

