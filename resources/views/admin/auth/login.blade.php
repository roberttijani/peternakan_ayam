<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Label - Premium Responsive Bootstrap 4 Admin & Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/Label_Admin/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="/Label_Admin/src/assets/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/Label_Admin/src/assets/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/Label_Admin/src/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="/Label_Admin/src/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="authentication-theme auth-style_1">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
              <div class="row">
                <div class="col-12 logo-section text-center">
                  <h1 style="color:#696FFB; font-weight: bold; font-family: serif;" >LOGIN</h1>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                  <form action="{{ route('login-proses') }}" method="POST">
                    @csrf
                    <div class="form-group input-rounded">
                      <input type="email" name="email" class="form-control" placeholder="email" />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-inline">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="form-check-input" />Remember me <i class="input-frame"></i>
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                  </form>
                  <div class="signup-link">
                    <p>Don't have an account yet?</p>
                    <a href="{{ route('register') }}">Sign Up</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <script src="/Label_Admin/src/assets/vendors/js/core.js"></script>
    <script src="/Label_Admin/src/assets/vendors/js/vendor.addons.js"></script>
    <script src="/Label_Admin/src/assets/js/template.js"></script>
    <!-- endbuild -->
  </body>
</html>