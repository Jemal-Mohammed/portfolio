
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Internship And Career</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon')}}">
  <link href="{{('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{('frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


  <link href="{{('frontend/assets/css/style.css')}}" rel="stylesheet">
  {{-- stoasters --}}
  <script src="https://kit.fontawesome.com/07e6377223.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  {{-- <link href="{{'css/style.css'}}" rel="stylesheet"> --}}
</head>

<body>

  <!-- ======= Header ======= -->
 @include('frontend.layouts.header')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>We are team of talented Developers developing web base systems</h2>
      <a href="http://localhost:8000/" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main ">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" id="about">
            <h3>About Us</h3>
            <p class="fst-italic">
                Welcome to Internship And Carrer Management System, your number one source for all things related to Internship. I'm dedicated to giving you the very best of Servicesss with a focus on quality and real-world problem solutions.
                , Internship And Carrer Management System has come a long way from its beginnings in  located in. When I first started out, my passion for drove me to start my own  .
                I hope you enjoy my as much as I enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact me on  .
                Sincerely,
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$students}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$departments}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Departments</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$Cpositions}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Careers</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$Ipositions}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Internship POsitions</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div id="contact">

          @include('frontend.contact.contact')
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Popular Courses Section ======= -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.layouts.footer')
 <!-- End Footer -->

  <div id="preloader"></div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
            // return false;
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>l

  <!-- Vendor JS Files -->
  <script src="{{('frontend/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{('frontend/assets/vendor/bootstrap/js')}}/bootstrap.bundle.min.js')}}"></script>
  <script src="{{('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{('frontend/assets/js/main.js')}}"></script>
  <script src="plugins/common/common.min.js"></script>
  {{-- modal --}}
  <script src="{{asset('js/custom.min.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/gleek.js')}}"></script>
  <script src="{{asset('js/styleSwitcher.js')}}"></script>
   <!-- Toastr -->
   <script src="{{('plugins/toastr/js/toastr.min.js')}}"></script>
   <script src="{{('plugins/toastr/js/toastr.init.js')}}"></script>
</body>

</html>
