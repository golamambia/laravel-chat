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
[data-letters]:before {
content:attr(data-letters);
display:inline-block;
font-size:1em;
width:2.5em;
height:2.5em;
line-height:2.5em;
text-align:center;
border-radius:50%;
background:plum;
vertical-align:middle;
margin-right:1em;
color:white;
}
</style>
@stack('after-styles')    


@if (trim($__env->yieldContent('page-styles')))    
@yield('page-styles')
@endif    
</head>

<body id="page-top">

<div id="wrapper">

@include('front.layout.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
        <div id="content">
        @include('front.layout.navbar')  

        <!-- Begin Page Content -->
            <div class="container-fluid">
            @yield('content')
            <!-- /.container-fluid -->
            </div>
        <!-- End of Main Content -->
        </div>
    <!-- End of Content Wrapper -->


    </div>
<!-- End of Page Wrapper -->
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js')}} "></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}} "></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js')}} "></script>
@stack('after-script')
</body>

</html>

