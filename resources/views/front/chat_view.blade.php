<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="google-site-verification" content="v8tivgoXHe3wKFRkRBqABQp60y1J2BdAfbVq9scx4pA" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="" type="image/x-icon"> <!-- Favicon-->

    <title>Admin - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    
    @stack('before-styles')
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
    
.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.message_box {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 95%;
}
.outgoing_msg .message_box{
  width: 100%;
  padding: 0px;
}
.message-content p {
  background:#4584 none repeat scroll 0 0;
  border-radius: 3px;
  color:#444;
  font-size: 14px;
  margin: 0;
  padding:8px 12px 8px 12px;
  width: 100%;
}
.time_date {
  color:#444;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.message-content { width: 57%;}
.mesgs {
  float: left;
  padding:20px;
  padding-left:5px;
  width:100%;
}

.outgoing_msg .message-content p {
  background:#4e73df none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding:8px 12px 8px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.outgoing_msg .message-content{
  float:left;
  width:52%;
}

.incoming_msg{ overflow:hidden; margin:26px 0 26px;}
.incoming_msg .message-content{
  float:right;
  width:52%;
  text-align: end;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
  border-top: 1px solid #cccccc;
  padding: 0px;
  outline: none;
}
.type_msg {position: relative; margin-top:20px; padding-left:15px; padding-right:15px; padding-bottom:10px;}
.type_msg .input_msg_write{
  position: relative;
}

.image-upload > input
{
    display: none;
}

.image-upload
{
    background: #4e73df none repeat scroll 0 0; 
   border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 34px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 34px;
    outline: none !important;
    box-shadow: none;
}
.image-upload .fa
{
   padding: 9px 8px 0px 6px !important;
}

.msg_send_btn {
  background:#4e73df none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height:34px;
  position: absolute;
  right:40px;
  top: 11px;
  width:34px;
  outline: none !important;
  box-shadow:none; 
}
.msg_history {
  height: 516px;
  overflow-y: auto;
  padding-left:20px; 
}

.msg_history::-webkit-scrollbar {
  width:8px;
}
.msg_history::-webkit-scrollbar-track {
  background:#ececec; 
  border-radius:10px; 
}
.msg_history::-webkit-scrollbar-thumb {
  background:#a2a1a1; 
  border-radius:10px; 
}
.msg_history::-webkit-scrollbar-thumb:hover {
  background:#a2a1a1; 
  border-radius:10px; 
}
.chat-box-icon{
  position: fixed;
  right:15px;
  bottom:12px;
  z-index:123; 
}
.chat-box-icon a{
  color: #ffffff;
  font-size: 18px;
  width: 44px;
  height: 44px;
  line-height: 40px;
  text-align: center;
  text-decoration: none;
  z-index: 999;
  border:2px solid #4e73df;
  background:#4e73df; 
  border-radius: 50%;
  display:inline-block; 
  padding:10px; 
  position: relative;
}
.chat-box-icon a img{
  width:30px; 
  vertical-align:top; 
}
.chat_notification{
  position: relative;
}
.chat_notification:before,
.chat-box-icon.chat_active a:before{
      position: absolute;
    width: 20px;
    height: 20px;
    content: '';
    background: #049338;
    right: -6px;
    top: -8px;
    border-radius: 50%;
    border: 1px solid #fff;
}    
.chat_notification:before{
    width: 14px;
    height: 14px;
    content: '';
    right:-8px;
    top:-8px;
}
</style>
</head>

<body id="page-top">

<div id="wrapper">
<div class="container-fluid">
<!-- Content Row -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="inbox_msg">
        <div class="msg_history">
        <div class="mesgs" id="capture">
        @php $last_msg_id = ""; $start_msg_id = (count($msgs) > 0) ? $msgs[count($msgs) - 1]->id : 0; @endphp
        @foreach($msgs as $msg)
        @php $last_msg_id = $msg->id;@endphp
            @if(Auth::user()->id != $msg->receiver_id)
                <div class="incoming_msg" {{$msg->id}}>
                    <div class="message_box">
                    <div class="message-content">
                    @if ($msg->msg != '') 
                        <p> {{$msg->msg}} </p>
                    @else
                        @if(in_array($msg->file_type ,['jpg','jpeg','png']))
                        <a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><img src="{{ URL('/')}}/{{$msg->attachment}}" width="250" height="150" class="rounded-sm border border-dark"/></a>
                        @else
                        <p><a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><i class='fa fa-paperclip'></i></a> {{$msg->file_name}} </p>
                        @endif                    
                    @endif
                    <span class="time_date">{{ date('h:i | d M', strtotime($msg->created_at)) }}</span>
                    </div>
                </div>
                </div>
            @else
                <div class="outgoing_msg" {{$msg->id}}>
                <div class="message_box">
                <div class="message-content">
                    @if ($msg->msg != '') 
                    <p> {{$msg->msg}} </p>
                    @else
                        @if(in_array($msg->file_type ,['jpg','jpeg','png']))
                        <a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><img src="{{ URL('/')}}/{{$msg->attachment}}" width="250" height="150" class="rounded-sm border border-dark"/></a>
                        @else
                        <p><a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><i class='fa fa-paperclip'></i></a> {{$msg->file_name}} </p>
                        @endif 
                    @endif
                    <span class="time_date">{{ date('h:i | d M', strtotime($msg->created_at)) }}</span> 
                </div>  
                </div>
                </div>
            @endif
            @endforeach
            </div>
            </div>
            </div>
        </div>
            </div>
    </div>
  </div>
</div>

<!-- Content Row -->
</div>
      <!-- End of Main Content -->

      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js')}} "></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}} "></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}} "></script>
</body>

</html>
