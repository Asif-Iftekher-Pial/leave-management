<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 @include('layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">

      @yield('content')
      
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 @include('layouts.script')

</body>

</html>