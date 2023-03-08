<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

       <img class="logo me-auto" style="width:100px;hieght:100px" src="{{asset('frontend/assets/img/picture1.jpg')}}" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{url('/')}}">Home</a></li>
          <li class="dropdown"><a href="#"><span>Positions</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('/positions')}}">Internship Positions</a></li>
              <li><a href="{{url('/carrers')}}">Career Positions</a></li>
            </ul>

          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          @if (session('user'))
          <li><a href="{{url('/placementInfo')}}">Application Info</a></li>
          <li><a href="{{url('/placementChoice')}}">Placement Choice</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    @if (session('user'))
    <a href="{{url('/profile',session('user')->id)}}" class="get-started-btn">My Profile</a>
    <a href="{{url('/report')}}" class="get-started-btn">Report</a>

      <a href="{{url('/logout')}}" class="get-started-btn">logout</a>
      @else
      <a href="{{url('/signIn')}}" class="get-started-btn">login</a>
      <a href="{{url('/signUp')}}" class="get-started-btn">register</a>

      @endif
      {{-- <a href="{{url('/signUp')}}" class="get-started-btn">Sign Up</a> --}}


    </div>
  </header><!-- End Header -->
