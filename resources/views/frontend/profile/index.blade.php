<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Students Profile </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS')}} File -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    {{-- stoasters --}}
    <script src="https://kit.fontawesome.com/07e6377223.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <link href="{{'css/style.css'}}" rel="stylesheet"> --}}
</head>

<body>

    @include('frontend.layouts.header')
    <!-- ======= Sidebar ======= -->

    <main id="main" class="main">
        <div class="container">

            <div class="pagetitle">
                <h1>Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section profile">
                <div class="row">
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <img style="width: 200px" src="{{ asset($student->image) }}" alt="Profile" class="rounded-circle">

                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-edit">Edit Profile</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Change Password</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">FULL NAME</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->Fname }} {{ $student->Lname }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone Number</div>
                                            <div class="col-lg-9 col-md-8"> {{ $student->phone }} </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Bank Acount Number</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->bank_acount_no }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Bank Name</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->bank_name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">CGPA</div>
                                            <div class="col-lg-9 col-md-8">{{ $student->CGPA }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Recomendation</div>
                                            <div  class="col-lg-9 col-md-8"><img style="width:200px" src="{{asset($student->recomendation)}}" alt="">
                                            <a href="{{url('download',$student->id)}}">download</a></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                        <!-- Profile Edit Form -->
                                        <form action="{{ url('updateProfile', session('user')->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="profileImage"
                                                    class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <img style="width: 200px" src="{{ asset($student->image) }}" alt="Profile">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Frest
                                                    Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" name="Fname"
                                                        value="{{ $student->Fname }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="about" class="col-md-4 col-lg-3 col-form-label">Last
                                                    Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" name="Lname"
                                                        value="{{ $student->Lname }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="company" class="col-md-4 col-lg-3 col-form-label">Phone
                                                    Number</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" name="phone" id=""
                                                        class="form-control" value="{{ $student->phone }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Bank
                                                    Acount Number</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="bank_acount_no" type="text" class="form-control"
                                                        id="Job" value="{{ $student->bank_acount_no }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Bank
                                                    Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="bank_name" type="text" class="form-control"
                                                        id="Country" value="{{ $student->bank_name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Spacial
                                                    Skills</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="spacialSkill" type="text" class="form-control"
                                                        id="Country" value="{{ $student->spacialSkill }}">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="profile-settings">
                                        <!-- Settings Form -->
                                    </div>
                                    <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <!-- Change Password Form -->
                                        <form action="{{ url('changePassword', session('user')->id) }}"
                                            method="post">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="currentPassword"
                                                    class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="password" type="password" class="form-control"
                                                        id="currentPassword">
                                                    @if ($errors->has('password'))
                                                        <h5 class="text-danger">*{{ $errors->first('password') }}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                    Password</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="newpassword" type="password" class="form-control"
                                                        id="newPassword">
                                                    @if ($errors->has('newpassword'))
                                                        <h5 class="text-danger">*{{ $errors->first('newpassword') }}
                                                        </h5>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Change
                                                    Password</button>
                                            </div>
                                        </form><!-- End Change Password Form -->

                                    </div>
                                </div><!-- End Bordered Tabs -->
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
 @include('frontend.layouts.footer')
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
            // return false;
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>l
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS')}} File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ 'plugins/toastr/js/toastr.min.js' }}"></script>
    <script src="{{ 'plugins/toastr/js/toastr.init.js' }}"></script>
</body>

</html>
