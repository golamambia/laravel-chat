@extends('admin.layout.master')

@push('after-styles')
 <!-- Custom styles for this page -->
 <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

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
    <h6 class="m-0 font-weight-bold text-primary">Chats Details</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Chat</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($results as $key => $val)
          <tr>
            <td>{{$val->sender_name}}</td>
            <td>{{$val->receiver_name}}</td>
            <td>
              @if ($val->msg != '') 
                <p class="textmsg" data-msg="{{$val->msg}}"> {{$val->msg}} </p>
                @else
                  @if(in_array($val->file_type ,['jpg','jpeg','png']))
                  <a download class="attchments" href='{{ URL("/")}}/{{$val->attachment}}'><img src="{{ URL('/')}}/{{$val->attachment}}" width="70" height="50" class="rounded-sm border border-dark"/></a>
                  @else
                  <p class="textmsg"><a download class="attchments" href='{{ URL("/")}}/{{$val->attachment}}'><i class='fa fa-paperclip'></i></a> {{$val->file_name}} </p>
                  @endif 
              @endif
            </td>
            <td><a href="#" title="Delete" class="subscribers-delete" dataId="{{$val->id}}" onclick="deleteRecord('{{$val->id}}')"><i class="fa fa-trash"></i></a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Content Row -->
@endsection

@push('after-script')
 <!-- Page level plugins -->
 <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
    

    function deleteRecord(num){
        swal({
            title: "Are you sure?",
            text: "But you will still be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Confirm it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
            window.location.href = '{{URL("admin/chats")}}{{"/delete"}}/'+ num; 
            } else {
            swal("Cancelled", "Your Data file is safe :)", "error");
            }
        });
    };
</script>
@endpush