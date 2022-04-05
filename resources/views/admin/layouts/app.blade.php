
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/Label_Admin/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/Label_Admin/src/assets/vendors/css/vendor.addons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/Label_Admin/src/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('/Label_Admin/src/assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('/Label_Admin/src/assets/images/favicon.ico') }}" />
    @yield('head-script')
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    @include('admin.layouts.navbar')
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.sidebar')
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">

          <div class="content-viewport">
            <div class="row">
              <div class="col-12 py-5">
                <h4>@yield('page')</h4>
              </div>
            </div>
            <div class="row">
             @yield('content')
            </div>
          </div>

        </div>
      </div>
    </div>
    @include('sweetalert::alert')
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/Label_Admin/src/assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="/Label_Admin/src/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/Label_Admin/src/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/Label_Admin/src/assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/Label_Admin/src/assets/js/template.js"></script>
    <script src="/Label_Admin/src/assets/js/dashboard.js"></script>
    <!-- endbuild -->
    
    @yield('end-script')
  </body>
</html>