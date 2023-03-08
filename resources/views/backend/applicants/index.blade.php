@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Intern Ship Applicants</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">CGPA</th>
                <th scope="col">Spacial Skill</th>
                <th scope="col">FeedBack</th>
                <th scope="col">Work Area</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $key=>$applicant)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$applicant->student->Fname}}</td>
                  <td>{{$applicant->student->Lname}}</td>
                  <td>{{$applicant->student->email}}</td>
                  <td>{{$applicant->student->CGPA}}</td>
                  <td>{{$applicant->student->spacialSkill}}</td>
                  <td>{{$applicant->feedback}}</td>
                  <td>{{$applicant->position->title}}</td>

                   <td><a href="{{url('/acceptStudents',$applicant->id)}}" class="btn btn-success">accept</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
