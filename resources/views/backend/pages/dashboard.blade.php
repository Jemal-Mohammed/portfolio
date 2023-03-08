@extends('backend.master')
@section('content')
<section class="section dashboard">
  <div class="row justify-content-center">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row ">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">



            <div class="card-body bg-secondary">
              <h5 class="card-title text-light">Students <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa fa-users"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$student}}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card revenue-card">


            <div class="card-body bg-secondary">
              <h5 class="card-title text-light">Departments <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$department}}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">



            <div class="card-body bg-secondary">
              <h5 class="card-title text-light">Internship Companies <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$supervisor}}</h6>


                </div>
              </div>

            </div>

          </div>

        </div><!-- End Customers Card -->

         <!-- Customers Card -->
         <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">



              <div class="card-body bg-secondary">
                <h5 class="card-title text-light">Carrers <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$carrer}}</h6>


                  </div>
                </div>

              </div>

            </div>

          </div><!-- End Customers Card -->

        <!-- Top Selling -->

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->

  </div>
</section>
@endsection
