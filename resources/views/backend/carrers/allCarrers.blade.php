@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">carrers</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Company Name</th>
                <th scope="col">work Area</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col"> Salary</th>


                {{-- <th scope="col">Action</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($carrers as $key=>$carrer)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$carrer->companyName}}</td>
                  <td>{{$carrer->title}}</td>
                  <td>{{$carrer->address}}</td>
                  <td>{{$carrer->city}}</td>
                  <td>{{$carrer->salery}}</td>


                   {{-- <td><a href="{{url('/acceptCarrers',$carrer->id)}}" class="btn btn-success">accept</a></td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
