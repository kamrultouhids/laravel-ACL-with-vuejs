<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <title>Login</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon-32.png')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/montserrat-font.css')}}">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <link rel="stylesheet" href="{{asset('app-assets/vendors/js/admin-toastr/toastr.min.css')}}">

  <style>

    body {
      position: absolute;
      top: 0; bottom: 0; left: 0; right: 0;
      height: 100%;
    }
    body:before {
      content: "";
      position: absolute;
      height: 20%; width: 20%;
      background-image: url('app-assets/images/logo/login-bg.png');
      background-size: cover;
      z-index: -1; /* Keep the background behind the content */

      /* don't forget to use the prefixes you need */
      -webkit-transform: scale(5);
      -webkit-transform-origin: top left;
      -webkit-filter: blur(1px);
    }


  </style>
</head>
<body class="vertical-layout vertical-menu 1-column  menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img  src="{{asset('app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo" class="img-fluid">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span><b>Login Panel</b> </span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('login')}}">
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" id="user-name" placeholder="Your Username" name="username" value="{{old('username')}}">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        @if ($errors->has('username'))
                          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="user-password" placeholder="Enter Password" name="password"">
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left"></div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                          <a  href="{{ route('password.request') }}" class="card-link"><b>
                            {{ __('Forgot Your Password?') }}</b>
                          </a>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> <b>Login</b></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- END PAGE LEVEL JS-->
  <script src="{{asset('app-assets/vendors/js/admin-toastr/toastr.min.js')}}"></script>
  {!! Toastr::message() !!}

</body>
</html>