@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="row justify-content-center">


    <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-success">Add Users</h5>
            <!-- Vertical Form -->
            <form class="row g-3" action="{{url('addCoordinators')}}" method="POST">
                @csrf
              <div class="col-12">
                <label for="inputNanme4" class="form-label">First Name</label>
                <input type="text" class="form-control" name="Fname"  id="inputNanme4">
                @if ($errors->has('Fname'))
                <h5 class="text-danger">*{{$errors->first('Fname')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="Lname"  id="inputNanme4">
                @if ($errors->has('Lname'))
                <h5 class="text-danger">*{{$errors->first('Lname')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="inputEmail4">
                @if ($errors->has('email'))
                <h5 class="text-danger">*{{$errors->first('email')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="inputPassword4">
                @if ($errors->has('password'))
                <h5 class="text-danger">*{{$errors->first('password')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Confirm Password</label>
                <input id="password" class="form-control" type="password" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <h5 class="text-danger">*{{$errors->first('password_confirmation')}}</h5>
                @endif
              </div>
             
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
        </section>
@endsection
