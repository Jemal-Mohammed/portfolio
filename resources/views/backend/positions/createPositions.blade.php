@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="row justify-content-center">


    <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-success">Add Positions</h5>
            <!-- Vertical Form -->
            <form class="row g-3" action="{{url('addPositions')}}" method="POST">
                @csrf
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="companyName"  id="inputNanme4">
                @if ($errors->has('companyName'))
                <h5 class="text-danger">*{{$errors->first('companyName')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Position title</label>
                <input type="text" class="form-control" name="title"  id="inputNanme4">
                @if ($errors->has('title'))
                <h5 class="text-danger">*{{$errors->first('title')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="inputEmail4">
                @if ($errors->has('adress'))
                <h5 class="text-danger">*{{$errors->first('adress')}}</h5>
                @endif
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="inputPassword4">
                @if ($errors->has('city'))
                <h5 class="text-danger">*{{$errors->first('city')}}</h5>
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
