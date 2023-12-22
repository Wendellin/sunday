<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title') || {{ config('app.name') }}</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('backend/asset/images/logo1.png') }}" />


      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('backend/asset/css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('backend/asset/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('backend/asset/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('backend/asset/css/responsive.css') }}">
   </head>
   <body>

        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="{{ route('welcome') }}"><img src="{{ asset('backend/asset/images/logo-white.png') }}" class="img-fluid" alt="{{ config('app.name') }}"></a>
                                <div class="item">
                                    <img src="{{ asset('backend/asset/images/login/1.png') }}" class="img-fluid mb-4" alt="{{ config('app.name') }}">
                                    <h4 class="mb-1 text-white">Manage your Appointments</h4>
                                    <p>It is a long established fact that appointments are more managable on time and resources.</p>
                                </div>
                        </div>
                    </div>


                    @yield('content')

                </div>
            </div>
        </section>
        <!-- Sign in END -->


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('backend/asset/js/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/popper.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('backend/asset/js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('backend/asset/js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('backend/asset/js/waypoints.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('backend/asset/js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('backend/asset/js/apexcharts.js') }}"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('backend/asset/js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('backend/asset/js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('backend/asset/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('backend/asset/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('backend/asset/js/smooth-scrollbar.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('backend/asset/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('backend/asset/js/custom.js') }}"></script>


   </body>
</html>
