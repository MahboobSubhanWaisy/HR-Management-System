<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 08:11:52 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('../../data/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../data/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('../../data/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../data/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('../../data/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('../../data/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100 offset-4 mt-4">
            <div class="col-lg-8 mx-auto">
              <div class="row">
                <div class="col-lg-6 bg-white">
                  <div class="auth-form-light text-center p-5">
                    <h2 class="text-success">SIGN IN</h2>
                    <!-- <h4 class="font-weight-light">Hello! let's get started</h4> -->
                      <form method="POST" action="{{ route('login') }}" class="pt-5">
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">E-Mail Address</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                          <i class="mdi mdi-account"></i>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                          <i class="mdi mdi-eye"></i>
                          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-12 text-left p-0 ml-4 pt-1 pt-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="mt-4">
                          <!-- <a class="btn btn-block btn-success btn-lg font-weight-medium" href="/about">Login</a> -->
                          <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium">
                                    {{ __('Login') }}
                            </button>
                        </div>
                        <div class="mt-4 text-center">
                        @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}" class="auth-link text-black">
                          {{ __('Forgot Your Password?') }}
                          </a>
                          @endif
                        </div>
                    </form>
                  </div>
                </div>
                <!-- <div class="col-lg-6 login-half-bg d-flex flex-row">
                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('../../data/js/off-canvas.js')}}"></script>
  <script src="{{ asset('../../data/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('../../data/js/misc.js')}}"></script>
  <script src="{{ asset('../../data/js/settings.js')}}"></script>
  <script src="{{ asset('../../data/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/victory/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 08:11:52 GMT -->
</html>