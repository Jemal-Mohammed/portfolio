

@extends('backend.master')
@section('content')
<section class="section dashboard">
    @if ($students->isEmpty())
    <div class="container mt-5">
        <div class="row justify-content-center">

            <h1>NO RECORDS YET</h1>
        </div>
    </div>
    @else

    <div class="card">

        <div class="card-body">
          <h5 class="card-title">Table with hoverable rows</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">University Id</th>
                <th scope="col">CGPA</th>
                <th>Apparent Result</th>
                <th scope="col">email</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($students as $key=>$student)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$student->Fname}}</td>
                  <td>{{$student->Lname}}</td>
                  <td>{{$student->username}}</td>
                  <td>{{$student->CGPA}}</td>
                  <td>{{$student->apparentResult}}</td>
                  <td>{{$student->email}}</td>

                  <td>
                      <a class="btn btn-primary" href="{{url('viewassignCGPA',$student->id)}}">Insert CGPA</button>
                 </td>
                </tr>


                @endforeach
            </tbody>
          </table>


    @endif



        </section>
      <!-- Small modal -->

@endsection
