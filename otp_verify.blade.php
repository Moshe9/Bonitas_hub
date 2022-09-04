<!DOCTYPE html>
<html class="loading"
  lang="de"
  data-textdirection="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="9VdJqpkygTBEVBHrYwctw1IdD9bGBrPCkglHVJUC">

  <title>User Login | Bonitas Business Hub</title>
  <link rel="apple-touch-icon" href="{{asset('frontend/images/favicon/apple-touch-icon-152x152.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon/favicon-32x32.png')}}">

  <!-- Include core + vendor Styles -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/vendors/vendors.min.css')}}">
<!-- BEGIN: VENDOR CSS-->
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css"
  href="{{asset('frontend/css/themes/vertical-modern-menu-template/materialize.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('frontend/css/themes/vertical-modern-menu-template/style.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/pages/login.css')}}">

<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/laravel-custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/font-awesome/css/font-awesome.min.css')}}">
<!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body
  class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  login-bg "
  data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
  <div class="row">
    <div class="col s12">
      <div class="container">
        <!--  main content -->
        <div id="login-page" class="row">
            <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                <form class="login-form" action="{{url('/verify-otp')}}" method="post">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                    <img src="{{asset('frontend/images/bonitas_assets/logo_red.png')}}" style="width: 300px; height: auto; align-content: center; margin-left: 80px;" alt="">
                    <hr class="horizontal_line">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <h4 class="title">BUSINESS HEALTH HUB</h4>
                        <p style="text-align: center;">Please enter the OTP that was sent to you via SMS and email</p>
                    </div>
                    @if(Session::has('fail'))
                        <p class="alert alert-danger" style="text-align: center; color: red;"><i class = "fa fa-times-circle" style="color: red;"></i> {{ Session::get('fail') }}</p>
                    @elseif(Session::has('success'))
                        <p class="alert alert-success"style="text-align: center; color: green;"><i class = "fa fa-check-circle" style="color: green;"></i> {{ Session::get('success') }}</p>
                    @endif
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                    <i class="fa fa-key prefix"></i>
                    <input id="otp" name="otp" type="text">
                    <label for="otp" class="center-align">Enter your OTP</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light btn-bonitas"><i class="fa fa-sign-in"></i> Verify OTP
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small text-links"><a href="{{URL::to('/forgot-pass')}}">Forgot password ?</a>
                    </p>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
      
      <div class="content-overlay"></div>
    </div>
  </div>
  
  <!-- BEGIN VENDOR JS-->
<script src="{{asset('frontend/js/vendors.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/search.js')}}"></script>
<script src="{{asset('frontend/js/custom/custom-script.js')}}"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->

</body>

</html>
