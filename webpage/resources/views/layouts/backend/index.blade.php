<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title') || Bombo Hosp</title>


    @include('layouts.backend.includes.header')


   </head>
   <body>
      
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->

         @include('layouts.backend.includes.sidebar')

         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
                @include('layouts.backend.includes.navbar')
            <!-- TOP Nav Bar END -->


            <div class="container-fluid">
               @yield('content')
            </div>


      <!-- Footer -->
        @include('layouts.backend.includes.footer')
      <!-- Footer END -->
         </div>
      </div>
      <!-- Wrapper END -->


      @include('layouts.backend.includes.scripts')

   </body>
</html>
