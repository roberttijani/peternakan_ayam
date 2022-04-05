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
          @if (session('berhasil'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{ session('berhasil') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="grid">
            <div class="grid-body">
              <div class="row">

                <div class="col-12 logo-section text-center">
                  <h1 style="color:#696FFB; font-weight: bold; font-family: serif;" >REGISTER</h1>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                  <form method="POST" action="{{ route('register_proses') }}">
                  @csrf
                    <div class="form-group">
                      <label for="inputEmail1">Nama</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail1" placeholder="Nama">
                      @error('name')
                        <div class="invalodfeedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="inputPassword1">Email</label>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="inputPassword1" placeholder="Email">
                      @error('email')
                        <div class="invalodfeedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="inputPassword1">No Hp</label>
                      <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="inputPassword1" placeholder="No Hp">
                      @error('no_hp')
                        <div class="invalodfeedback">{{ $message }}</div>
                      @enderror
                    </div>
                      <div class="form-group">
                        <label for="inputPassword1">password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword1" placeholder="Password">
                        @error('password')
                        <div class="invalodfeedback">{{ $message }}</div>
                      @enderror
                      </div>
                    <div class="form-group">
                      <label for="inputPassword1">Alamat</label>
                      <div class="col-md-12 showcase_content_area">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="inputType9" cols="12" rows="5"></textarea>
                      </div>
                      @error('alamat')
                        <div class="invalodfeedback">{{ $message }}</div>
                      @enderror
                    </div>
                      <div class="form-group">
                        <label for="inputPassword1">Jabatan</label>
                        <div class="form-inline">
                          <div class="radio mb-3">
                            <label class="radio-label">
                              <input name="role" type="radio"  value="petugas">Petugas<i class="input-frame @error('role') is-invalid @enderror"></i>
                            </label>
                          </div>
                          <div class="radio mb-3">
                            <label class="radio-label">
                              <input name="role" type="radio" value="kasir">Kasir<i class="input-frame @error('role') is-invalid @enderror"></i>
                            </label>
                          </div>
                          @error('role')
                            <div class="invalodfeedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    <button type="submit" class="btn btn-sm btn-primary">Sign Up</button>
                  </form>
                  <div class="signup-link">
                    <p>have an account ?</p>
                    <a href="{{ route('login') }}">Sign In</a>
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