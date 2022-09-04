<!DOCTYPE html>

<html class="loading"
  lang="de"
  data-textdirection="ltr">
<!-- BEGIN: Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="9VdJqpkygTBEVBHrYwctw1IdD9bGBrPCkglHVJUC">

  <title>Bonitas | Business Hub</title>
  <link rel="apple-touch-icon" href="{{asset('frontend/images/favicon/apple-touch-icon-152x152.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon/favicon-32x32.png')}}">

  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/vendors.min.css')}}">
<!-- BEGIN: VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/select2/select2-materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/pages/page-users.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/materialize-stepper/materialize-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/select2/select2-materialize.css')}}">
<!-- END: VENDOR CSS-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css"
  href="{{asset('frontend/css/themes/vertical-modern-menu-template/materialize.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('frontend/css/themes/vertical-modern-menu-template/style2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/pages/form-wizard.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.min.js"></script>

<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/laravel-custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/fedhealth.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/pages/form-select2.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/forms.css')}}">
<!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<?php $id = Session::get('id');
      $role = Session::get('role');
?>

<body
  class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  "
  data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

  <!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed ">
        <nav>
            <div class="nav-wrapper">
                <a href="{{url('/hub-home')}}" class="brand-logo"><img src="{{asset('frontend/images/bonitas_assets/fed_logo.png')}}" alt="Bonitas Logo" style="width:250px;"></a>
                <ul class="right hide-on-med-and-down">
                  @if($role == 0 || $role == 3)
                    <li><a href="{{URL::to('/dashboard')}}">HOME</a></li>
                  @elseif($role == 2)
                    <li><a href="{{URL::to('/brokerage-view')}}">HOME</a></li>
                  @endif
                    <li><a href="{{URL::to('/marketing-elements')}}">MARKETING ELEMENTS</a></li>
                    <li><a href="https://newaccount1613558039243.freshdesk.com/support/home">SYSTEM SUPPORT</a></li>
                    <li><a href="{{URL::to('/my-account/' . $id)}}">MY ACCOUNT</a></li>
                    <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
  <!-- END: Header-->
    {{-- BEGIN Page Main --}}
        @yield('content')
  <!-- END: Page Main-->
<footer
  class="page-footer footer gradient-shadow  footer-static   footer-dark">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://forms.afrocentricds.com/wordpress/"
          target="_blank">Bonitas</a> All rights reserved.
      </span>
      <span class="right hide-on-small-only">
        Designed and Developed by <a href="www.tendaiict.com">Tendai ICT</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->  
  <!-- BEGIN VENDOR JS-->
  
<script src="https://code.jquery.com/jquery-3.5.0.js"></script> 
<script src="{{asset('frontend/js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('frontend/vendors/select2/select2.full.min.js')}}"></script>
<script src="{{asset('frontend/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('frontend/vendors/materialize-stepper/materialize-stepper.min.js')}}"></script>
<script src="{{asset('frontend/js/scripts/form-elements.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/search.js')}}"></script>
<script src="{{asset('frontend/js/custom/custom-script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{asset('frontend/js/slick.js')}}"></script>
<script src="{{asset('frontend/js/scripts/page-users.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('frontend/js/scripts/form-file-uploads.js')}}"></script>
<script src="{{asset('frontend/js/scripts/ui-alerts.js')}}"></script>
<script src="{{asset('frontend/js/scripts/form-wizard.js')}}"></script>
{{-- <script src="{{asset('frontend/js/forms.js')}}"></script> --}}
<script src="{{asset('frontend/js/scripts/form-select2.js')}}"></script>
{{-- <script src="{{asset('frontend/js/dependants.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
