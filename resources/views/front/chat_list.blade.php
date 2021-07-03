@extends('front.layout.master')

@push('after-styles')
<style>
.outgoing_msg .message_box{
  width: 100%;
  padding: 0px;
}
.message-content p {
  background:<?php echo (Auth::user()->chat_color != '') ? Auth::user()->chat_color : '#4584'; ?> none repeat scroll 0 0;
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
  font-size: 14px;
  margin: 8px 0 0;
}
.message-content { width: 57%;}
.mesgs {
  padding:20px;
  padding-left:5px;
  width:100%;
}

.outgoing_msg .message-content p {
  background:<?php echo ($receiverInfo->chat_color != '') ? $receiverInfo->chat_color : '#4584'; ?> none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; 
  color:#444;
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
  font-size: 14px;
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
    font-size: 14px;
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
  font-size: 14px;
  height:34px;
  position: absolute;
  right:40px;
  top: 11px;
  width:34px;
  outline: none !important;
  box-shadow:none; 
}
.msg_history2 {
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
  font-size: 14px;
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
mark {
  background: yellow;
}

mark.current {
  background: orange;
}

/* // sticky */
.sticky {
  position: fixed;
  top: 0;
  width: 79%;
  z-index : 999999;
  padding-bottom: 0rem !important
}

.sticky + .content {
  padding-top: 102px;
}

@media only screen and (max-width: 420px) {
  .sticky {
  width: 87% !important;
}


}
</style>
@endpush
@section('content')
<!-- Content Row -->
<!-- DataTales Example -->

<div class="card shadow mb-4">
  <div class="card-header py-3 header" id="myHeader">
    <div class="pull-right" style="float: right;">
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="chatDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i></a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="chatDropdown">
                  <a class="dropdown-item downloadChat" data-senderID="{{Auth::user()->id}}" data-receiverID="{{$receiverInfo->id}}" data-action="text" href="javascript:void(0)">
                  <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                  Only Chat
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item downloadChat" data-senderID="{{Auth::user()->id}}" data-receiverID="{{$receiverInfo->id}}"  data-action="pdf" href="javascript:void(0)">
                  <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                  Chat With Image
                  </a>
              </div>
            
            </li>

        </ul>
        <!-- Topbar Navbar -->
    </div>
    <div class="header" style="float: right;padding-right: 25%;">
      <input type="search" placeholder="search">
      <button data-search="next">&darr;</button>
      <button data-search="prev">&uarr;</button>
      <button data-search="clear">✖</button>
    
      <button id="btn-decrease">A-</button>
      <button id="btn-orig">A</button>
      <button id="btn-increase">A+</button>
    </div>
    <h6 class="m-0 font-weight-bold text-primary">Chat with {{ ucwords($receiverInfo->name)}}</h6>
    </br>    
    
  </div>

  <div class="card-body">
    <div class="inbox_msg">
        <div class="msg_history">

            @if(count($msgs) > 99999)  
            <div class="show_old_msg">  
              <center><a href="javascript::void()" class="alert alert-info show_old_msg"> <u>Show More</u></a></center>
            </div>
            @endif
            <div class="mesgs content" id="capture">
                @php $last_msg_id = ""; $start_msg_id = (count($msgs) > 0) ? $msgs[count($msgs) - 1]->id : 0; @endphp
                @foreach($msgs as $msg)
                @php $last_msg_id = $msg->id;@endphp
                    @if(Auth::user()->id != $msg->receiver_id)
                        <div class="incoming_msg" id="record_{{$msg->id}}">
                            <div class="message_box">
                              <div class="message-content">
                              @if ($msg->msg != '') 
                                  <p class="textmsg" data-msg="{{$msg->msg}}"> {{$msg->msg}} </p>
                              @else
                                  @if(in_array($msg->file_type ,['jpg','jpeg','png']))
                                  <a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><img src="{{ URL('/')}}/{{$msg->attachment}}" width="250" height="150" class="rounded-sm border border-dark"/></a>
                                  @else
                                  <p class="textmsg"><a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><i class='fa fa-paperclip'></i></a> {{$msg->file_name}} </p>
                                  @endif                    
                              @endif
                              <span class="time_date">{{ date('H:i | d M', strtotime($msg->created_at)) }}  <a class="deleteChat" href="javascript:void(0);" data-id="{{$msg->id}}" id="deleteChat_{{$msg->id}}"><i class="fas fa-trash"></i></a></span>
                              </div>
                            </div>
                        </div>
                    @else
                        <div class="outgoing_msg" id="record_{{$msg->id}}">
                          <div class="message_box">
                            <div class="message-content">
                                @if ($msg->msg != '') 
                                <p class="textmsg" data-msg="{{$msg->msg}}"> {{$msg->msg}} </p>
                                @else
                                    @if(in_array($msg->file_type ,['jpg','jpeg','png']))
                                    <a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><img src="{{ URL('/')}}/{{$msg->attachment}}" width="250" height="150" class="rounded-sm border border-dark"/></a>
                                    @else
                                    <p class="textmsg"><a download class="attchments" href='{{ URL("/")}}/{{$msg->attachment}}'><i class='fa fa-paperclip'></i></a> {{$msg->file_name}} </p>
                                    @endif 
                                @endif
                                <span class="time_date">{{ date('H:i | d M', strtotime($msg->created_at)) }}</span> 
                            </div>  
                          </div>
                        </div>
                    @endif
                    @endforeach
            </div>
            <div class="type_msg">
                <div class="input_msg_write">
                    <form class="chat-form" id="frmChat" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group mb-3">
                          <input  autocomplete="off" type="text" id="msg" name="msg" class="form-control write_msg" placeholder="Type a message" value="" required />
                          <div class="input-group-append">
                            <button class="msg_send_btn" id="msg_send" name="msg_send" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            <div class="image-upload">
                              <label for="chat_attachment">
                                  <i class='fa fa-paperclip fa-lg' aria-hidden="true"></i>   
                              </label>
                              <input  autocomplete="off" type="file" id="chat_attachment" name="chat_attachment"  class="msg_send_btn"/>
                            </div>    
                          </div>
                          <input type="hidden" id="receiver_id" name="receiver_id" value="{{$receiver_id}}"/>
                          <input type="hidden" id="start_msg_id" name="start_msg_id" value = "{{$start_msg_id}}"/>
                          <input type="hidden" id="last_msg_id" name="last_msg_id" value="{{($last_msg_id > 0) ? $last_msg_id : 0}}"/>
                        
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
  </div>
    
</div>

<!-- Content Row -->
@endsection

@push('after-script')
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>  
<script src="https://cdn.jsdelivr.net/g/jquery@3.1.0,mark.js@8.6.0(jquery.mark.min.js)"></script>

<script>
setTimeout(() => {
   $('.msg_history').scrollTop($('.mesgs').height());   
}, 1500);

setInterval(function(){get_msgs();}, 10000);

var last_msg_id = $("#last_msg_id").val();

$("#msg_send").on("click",function(){
   $('#frmChat').submit();
});

$('.attchments').click(function(e) {
   
   e.preventDefault();  //stop the browser from following
   var link = $(this).attr("href");
   download_file(link);
});

$(".downloadChat").on("click", function(){
    var senderID = $(this).attr('data-senderID');
    var receiverID = $(this).attr('data-receiverID');
    var action = $(this).attr('data-action');
    if(action == 'pdf'){
      // var element = document.getElementById('capture');
      // html2pdf(element);
      var element = document.getElementById('capture');
      var opt = {
        margin:       1,
        filename:     'chat_history.pdf',
      };
      // New Promise-based usage:
      html2pdf().set(opt).from(element).save();
    }else{
      $.ajax({
          url : '{{URL("/download_chat")}}',
          type : 'POST',
          headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data : {'senderID' : senderID, 'receiverID' : receiverID, 'action' : action},
          success : function(data) { 
              var res = JSON.parse(data);
              download_file(res.path);
          }
      });
    }
});

$("input[type='file']").on("change", function () {
   if(this.files[0].size > (parseInt(10 * 1000000))) {
      alert("Please upload file less than 10MB. Thanks!!");
      $(this).val('');
      return false;
   }else{
      var formData = new FormData($("#frmChat")[0]);
      var file_name = this.files[0].name;
   
      $.ajax({
         url : '{{URL("/send_attchment")}}',
         type : 'POST',
         data : formData,
         cache: false,
         contentType: false,
         processData: false,
         success : function(data) {  
            var res = JSON.parse(data);
            $(this).val('');
            var dt = new Date(res.data[0].created_at);
            var currtime = dt.getUTCHours() + ":" + dt.getUTCMinutes() +" | "+ pad (dt.getUTCDate(), 2) +" "+dt.toLocaleString(dt.getUTCMonth(), { month: 'short' }) ;            
            last_msg_id = parseInt(last_msg_id) + parseInt(1);
            
            if(res.file_type == 'jpeg' || res.file_type == 'jpg' || res.file_type == 'png'){
                $html = '<div class="incoming_msg" id="record_'+last_msg_id+'"><div class="message_box"><div class="message-content"><a download class="attchments" href="{{ URL("/")}}/'+res.path+'"><img src="{{ URL("/")}}/'+res.path+'" width="250" height="150" class="rounded-sm border border-dark"/></a><span class="time_date">'+currtime+'<a class="deleteChat" href="javascript:void(0);" data-id="'+last_msg_id+'" id="deleteChat_'+last_msg_id+'"><i class="fas fa-trash"></i></a></span> </div>  </div></div>';
            }else{
                $html = '<div class="incoming_msg" id="record_'+last_msg_id+'"><div class="message_box"><div class="message-content"><p><a download  class="attchments" href="{{URL("/")}}/'+res.path+'"><i class="fa fa-paperclip"></i></a> '+file_name+' </p><span class="time_date">'+currtime+'<a class="deleteChat" href="javascript:void(0);" data-id="'+last_msg_id+'" id="deleteChat_'+last_msg_id+'"><i class="fas fa-trash"></i></a></span> </div>  </div></div>';
            }            
            $(".mesgs").append($html); 
            $("#last_msg_id").val(last_msg_id);
            $("#msg").val("");
            var divHeight = parseInt($('.mesgs').height()) + parseInt(100);
            $('.msg_history').scrollTop(divHeight);
            $(".chat-box-icon").removeClass('chat_active');
         }
      });

      return false;
   }
});


$("#msg").keyup(function(event) {
   if (event.keyCode === 13) {
      $("form#msg_send").trigger("click");
   }
});
$('#frmChat').submit(function(e) { // <- goes here !
   e.preventDefault();
   var formData = $("#frmChat").serialize();
   if($("#msg").val().trim() != ""){
      $.ajax({
         url : '{{URL("/chat_msg_send")}}',
         type : 'POST',
         data : formData,
         success : function(data) {  
            var rs = JSON.parse(data);
            var dt = new Date(rs.data[0].created_at);
            var currtime = dt.getUTCHours() + ":" + dt.getUTCMinutes() +" | "+ pad (dt.getUTCDate(), 2) +" "+dt.toLocaleString(dt.getUTCMonth(), { month: 'short' }) ;
            
            last_msg_id = parseInt(last_msg_id) + parseInt(1);
            $html = '<div class="incoming_msg" id="record_'+last_msg_id+'"><div class="message_box"><div class="message-content"><p>'+$("#msg").val()+'</p><span class="time_date">'+currtime+' <a class="deleteChat" href="javascript:void(0);" data-id="'+last_msg_id+'" id="deleteChat_'+last_msg_id+'"><i class="fas fa-trash"></i></a></span> </div>  </div></div>';
            $(".mesgs").append($html); 
            $("#last_msg_id").val(last_msg_id);
            $("#msg").val("");
            var divHeight = parseInt($('.mesgs').height()) + parseInt(100);
            $('.msg_history').scrollTop(divHeight);
            $(".chat-box-icon").removeClass('chat_active');
         }
      });
   }
   return false;
});


$(".show_old_msg").on("click", function(){
   $.ajax({
      url : '{{URL("/show_old_msg")}}',
      type : 'POST',
      data : $("#frmChat").serialize(),
      success : function(res) { 
         var rs = JSON.parse(res);
         if(Object.keys(rs.data).length > 0){
            $(".mesgs").prepend(rs.html); 
            $("#start_msg_id").val(rs.data[parseInt(Object.keys(rs.data).length) - 1].id);
         }else{
            alert("No More Record Found"); 
            $(".show_old_msg").hide();
         }
      }
   });
   return false;
});

$("body").on("click", ".deleteChat", function(){
    id= $(this).attr('data-id');
    if(confirm('Are you sure to delete the chat?')) {
      $("#record_"+id).remove();
      $.ajax({
      url : '{{URL("/delete_msg")}}',
      headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type : 'POST',
      data : {id:id},
      success : function(res) { 
        $("#record_"+id).remove();    
        }
      });
    }
    
   return false;
});


function get_msgs(){
   var jqxhr = { abort: function() {} };
   
   /* code to run below */
   jqxhr.abort();
   jqxhr = $.ajax({
         url: '{{URL("/get_latest_msg")}}',
         type : 'POST',
         headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data : $("#frmChat").serialize(),
         success: function(res) {
            var rs = JSON.parse(res);
            $html = "";
            if(rs.data.length > 0){
               $(".mesgs").scrollTop = "200px";
               $.each(rs.data, function(key,msg) {
                  var dt = new Date(msg.created_at);
                  var currtime = dt.getUTCHours() + ":" + dt.getUTCMinutes() +" | "+ pad (dt.getUTCDate(), 2) +" "+dt.toLocaleString(dt.getUTCMonth(), { month: 'short' }) ;

                  last_msg_id = msg.id; //parseInt(last_msg_id) + parseInt(1);
                  $("#last_msg_id").val(msg.id);
                  if(msg.msg === null){
                    if(msg.file_type == 'jpeg' || msg.file_type == 'jpg' || msg.file_type == 'png'){
                        $html = '<div class="outgoing_msg"  id="record_'+msg.id+'"><div class="message_box"><div class="message-content"><a download class="attchments" href="{{ URL("/")}}/'+msg.attachment+'"><img src="{{ URL("/")}}/'+msg.attachment+'" width="250" height="150" class="rounded-sm border border-dark"/></a><span class="time_date">'+currtime+'</span> </div>  </div></div>';
                    }else{
                        $html = '<div class="outgoing_msg"  id="record_'+msg.id+'"><div class="message_box"><div class="message-content"><p><a download  class="attchments" href="{{URL("/")}}/'+msg.attachment+'"><i class="fa fa-paperclip"></i></a> '+msg.file_name+' </p><span class="time_date">'+currtime+'</span> </div>  </div></div>';
                    }
                  }else{
                    $html = '<div class="outgoing_msg"  id="record_'+msg.id+'"><div class="message_box"><div class="message-content"><p>'+msg.msg+'</p><span class="time_date">'+currtime+'</span> </div>  </div></div>';
                  }
                  $(".mesgs").append($html);   
                  var divHeight = parseInt($('.mesgs').height()) + parseInt(100);
                  $('.msg_history').scrollTop(divHeight);   
               });
                         
            }  
         }
   }); //do something
   
}


/* Helper function */
function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
				document.location = save.href; 
// window event not working here
			}else{
		        var evt = new MouseEvent('click', {
		            'view': window,
		            'bubbles': true,
		            'cancelable': false
		        });
		        save.dispatchEvent(evt);
		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
			}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}

//search
$(function() {

// the input field
var $input = $("input[type='search']"),
  // clear button
  $clearBtn = $("button[data-search='clear']"),
  // prev button
  $prevBtn = $("button[data-search='prev']"),
  // next button
  $nextBtn = $("button[data-search='next']"),
  // the context where to search
  $content = $(".content"),
  // jQuery object to save <mark> elements
  $results,
  // the class that will be appended to the current
  // focused element
  currentClass = "current",
  // top offset for the jump (the search bar)
  offsetTop = 50,
  // the current index of the focused element
  currentIndex = 0;

/**
 * Jumps to the element matching the currentIndex
 */
function jumpTo() {
  if ($results.length) {
    var position,
      $current = $results.eq(currentIndex);
    $results.removeClass(currentClass);
    if ($current.length) {
      $current.addClass(currentClass);
      position = $current.offset().top - offsetTop;
      $(window).scrollTop(position);
      // $('.msg_history').scrollTop(position);
    }
  }
}

/**
 * Searches for the entered keyword in the
 * specified context on input
 */
$input.on("input", function() {
  var searchVal = this.value;
  $content.unmark({
    done: function() {
      $content.mark(searchVal, {
        separateWordSearch: true,
        done: function() {
          $results = $content.find("mark");
          currentIndex = 0;
          jumpTo();
        }
      });
    }
  });
});

/**
 * Clears the search
 */
$clearBtn.on("click", function() {
  $content.unmark();
  $input.val("").focus();
});

/**
 * Next and previous search jump to
 */
$nextBtn.add($prevBtn).on("click", function() {
  if ($results.length) {
    currentIndex += $(this).is($prevBtn) ? -1 : 1;
    if (currentIndex < 0) {
      currentIndex = $results.length - 1;
    }
    if (currentIndex > $results.length - 1) {
      currentIndex = 0;
    }
    jumpTo();
  }
});
});


// font size effect
var $affectedElements = $("div, p"); // Can be extended, ex. $("div, p, span.someClass")

// Storing the original size in a data attribute so size can be reset
$affectedElements.each( function(){
  var $this = $(this);
  $this.data("orig-size", $this.css("font-size") );
});

$("#btn-increase").click(function(){
  changeFontSize(1);
})

$("#btn-decrease").click(function(){
  changeFontSize(-1);
})

$("#btn-orig").click(function(){
  $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , $this.data("orig-size") );
   });
})

function changeFontSize(direction){
    $affectedElements.each( function(){
        var $this = $(this);
        $this.css( "font-size" , parseInt($this.css("font-size"))+direction );
    });
}
</script>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
@endpush


