<!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('backend/asset/js/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/popper.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('backend/asset/js/bootstrap.datatables.js') }}"></script>
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
      <!-- lottie JavaScript -->
      <script src="{{ asset('backend/asset/js/lottie.js') }}"></script>
      <!-- am core JavaScript -->
      <script src="{{ asset('backend/asset/js/core.js') }}"></script>
      <!-- am charts JavaScript -->
      <script src="{{ asset('backend/asset/js/charts.js') }}"></script>
      <!-- am animated JavaScript -->
      <script src="{{ asset('backend/asset/js/animated.js') }}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{ asset('backend/asset/js/kelly.js') }}"></script>
      <!-- Flatpicker Js -->
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('backend/asset/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('backend/asset/js/custom.js') }}"></script>
      <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
      </script>

      {{-- Toastr --}}
      <script src="{{ asset('backend/asset/js/toastr.min.js') }}"></script>
      {!! Toastr::message() !!}
      <script>
        @if($errors->any())
          @foreach($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {
              closeButton:true,
              progressBar:true,
            });
          @endforeach
        @endif
    </script>

      {{-- Fontawesome 6  --}}
      <script src="https://kit.fontawesome.com/c99e7cdcbd.js" crossorigin="anonymous"></script>
