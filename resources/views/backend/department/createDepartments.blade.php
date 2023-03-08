@extends('backend.master')
@section('content')
<section class="section dashboard mt-5">
    <div class="row justify-content-center">


    <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-success">Add Departments</h5>
            <!-- Vertical Form -->
            <form class="row g-3" action="{{url('addDepartments')}}" method="POST">
                @csrf
              <div class="col-12">
                <label for="inputNanme4" class="form-label">First Name</label>
                <input type="text" class="form-control" name="name"  id="inputNanme4">
                @if ($errors->has('name'))
                <h5 class="text-danger">*{{$errors->first('name')}}</h5>
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
