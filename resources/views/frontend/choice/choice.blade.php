
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Placement Choce Icms</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
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
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Placement Choce</h2>


      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="container mb-5 border">
            <div class="row justify-content-center">
                <form action="{{url('choice')}}" method="post">
                    @csrf
                    <div class="col-8 justify-content-cenetr">
                        <h1>choose Company for Placement</h1>
                        <h5>FOR UNASSIGNED STUDENTS ONLY</h5>
                        <h5>You can choose Only 3 comapnies with your priorty companies and submit  times</h5>

                            <div class="form-group justify-content-center">

                                <select class="form-control" name="choice" id="">
                                    <option value="">Select Company</option>
                                    @foreach ($companies as $company)
                                  <option value="{{$company->id}}">{{$company->companyName}}</option>
                                 @endforeach
                                </select> <br>
                                <select class="form-control" name="priority" id="">
                                <option value="">Select priorty</option>
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" >
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="containe">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h2> PLACEMENT RESULT</h2>
            <table class="table">
                <tr>
                    <th>Student Name</th>
                    <th>University Id</th>
                    <th>Work Area</th>
                    <th>address</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Priority</th>

                </tr>
                @foreach ($results as $result)
                {{-- @if ($result->Student->feedback=='yes') --}}
{{-- @if ($result->status=='assigned') --}}

<tr>
    <td>{{$result->Student->Fname}}  {{$result->Student->Lname}}</td>
    <td>{{$result->Student->username}} </td>
    <td>{{$result->company->title}}  </td>
    <td>{{$result->company->address}}  </td>
    <td>{{$result->company->city}}  </td>
    <td>{{$result->status}}  </td>
    <td>{{$result->priority}}  </td>
</tr>
{{-- @endif --}}
                {{-- @endif --}}
                @endforeach
            </table>
                </div>
            </div>
        </div>
          </div>
        </div>


      </div>
    </section><!-- End Events Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('frontend.layouts.footer')

  <div id="preloader"></div>
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
  <script src="{{asset('frontend/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>
 <!-- Toastr -->
 <script src="{{('plugins/toastr/js/toastr.min.js')}}"></script>
 <script src="{{('plugins/toastr/js/toastr.init.js')}}"></script>
</body>

</html>
