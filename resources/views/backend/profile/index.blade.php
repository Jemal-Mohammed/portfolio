

@extends('backend.master')
@section('content')
<section class="section dashboard">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <section class="section profile">
                <div class="row">
                  <div class="col-xl-4">

                    <div class="card">
                      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{asset($profile->image)}}" alt="Profile" class="rounded-circle">

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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                          </li>

                          <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                          </li>



                          <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                          </li>

                        </ul>
                        <div class="tab-content pt-2">

                          <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                              <div class="col-lg-3 col-md-4 label ">First Name</div>
                              <div class="col-lg-9 col-md-8">{{session('user')->Fname}}</div>
                            </div>

                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">Last Name</div>
                              <div class="col-lg-9 col-md-8">{{session('user')->Lname}}</div>
                            </div>

                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">Role</div>
                              <div class="col-lg-9 col-md-8">{{session('user')->role}}</div>
                            </div>

                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">email</div>
                              <div class="col-lg-9 col-md-8">{{session('user')->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">phone</div>
                                <div class="col-lg-9 col-md-8">{{$profile->phone}}</div>
                              </div>

                          </div>

                          <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form action="{{url('updateBackendProfile',session('user')->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                  <img src="{{asset(session('user')->image)}}" alt="Profile">
                                  <input name="image" type="file" class="form-control" id="fullName" >

                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="Fname" type="text" class="form-control" id="fullName" value="{{session('user')->Fname}}">
                                </div>
                              </div>



                              <div class="row mb-3">
                                <label for="company" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="Lname" type="text" class="form-control" id="company" value="{{session('user')->Lname}}">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="phone" type="text" class="form-control" id="Job" value="{{session('user')->phone}}">
                                </div>
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                              </div>
                            </form><!-- End Profile Edit Form -->
                          </div>
                          <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="{{url('changeBackendPassword',session('user')->id)}}" method="POST" >
                                  @csrf
                              <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="password" type="password" class="form-control" id="currentPassword">
                                  @if ($errors->has('password'))
                                  <h5 class="text-danger">*{{$errors->first('password')}}</h5>
                                  @endif
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="newpassword" type="password" class="form-control" id="newPassword">
                                  @if ($errors->has('newpassword'))
                                  <h5 class="text-danger">*{{$errors->first('newpassword')}}</h5>
                                  @endif
                                </div>
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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
        </div>


        </section>


@endsection
