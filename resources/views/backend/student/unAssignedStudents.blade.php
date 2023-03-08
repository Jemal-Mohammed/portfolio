

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
          <h5 class="card-title">unAssigned Students</h5>


          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">University Id</th>
                <th scope="col">CGPA</th>
                <th scope="col">Conpany Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Priority</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                 @if ($student->Student->feedback=='NoFeedBack')

                 <tr>
                   {{-- <th scope="row">{{$key+1}}</th> --}}
                   <td>{{$student->Student->Fname}}</td>
                   <td>{{$student->Student->Lname}}</td>
                   <td>{{$student->Student->username}}</td>
                   <td>{{$student->Student->CGPA}}</td>
                   <td>{{$student->company->companyName}}</td>
                   <td>{{$student->company->address}}</td>
                   <td>{{$student->company->city}}</td>
                   <td>{{$student->priority}}</td>
                   <td>{{$student->status}}</td>

                  <td>  <a class="btn btn-success" href="{{url('makePlacement',$student->id)}}">Assign</a></td>
                 </tr>
                 @endif

                @endforeach
            </tbody>
          </table>


    @endif
        </section>
      <!-- Small modal -->

@endsection
