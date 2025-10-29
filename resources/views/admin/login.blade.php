<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex,nofollow" />
    <!-- START: Template CSS-->
    <link rel="stylesheet" href="/library/dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/library/dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/library/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/library/dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/library/dist/vendors/flags-icon/css/flag-icon.min.css">
    <link href="/library/dist/css/toastr.min.css" rel="stylesheet">

    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="/library/dist/vendors/social-button/bootstrap-social.css" />
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="/library/dist/css/main.css">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <form method="POST" aciton="{{ route('login') }}" class="row row-eq-height lockscreen  mt-5 mb-5">
                    @csrf
                    <div class="lock-image col-12 col-sm-6"></div>

                    <div class="login-form col-12 col-sm-6">
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                value="{{ old('password') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                    id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary" type="submit">Log In</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="/library/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="/library/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="/library/dist/vendors/moment/moment.js"></script>
    <script src="/library/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/library/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/library/dist/js/toaster.min.js"></script>
    <script>
        toastr.options = {
          "closeButton": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "timeOut": "5000"
        };
        @if(session('success'))
          toastr.success("{{ session('success') }}");
        @endif
        @if(session('error'))
          toastr.error("{{ session('error') }}");
        @endif
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
          @endforeach
        @endif
      </script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>
