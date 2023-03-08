@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Companies</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Company Name</th>
                <th scope="col">Addres</th>
                <th scope="col">city</th>
                <th scope="col">work area</th>
                <th scope="col">Supervisor</th>


                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($companies as $key=>$company)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$company->companyName}}</td>
                  <td>{{$company->address}}</td>
                  <td>{{$company->city}}</td>
                  <td>{{$company->title}}</td>
                  <td>{{$company->supervisor->Fname}} {{$company->supervisor->Lname}}</td>
                    <td><a href="{{route('deleteCompany', $company->id)}}" class="btn btn-danger">Delete</a></td>  
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
