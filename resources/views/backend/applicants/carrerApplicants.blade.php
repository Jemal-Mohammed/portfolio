@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Carrer Applicants</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Spacial Skill</th>
                <th scope="col">Work Area</th>
                <th scope="col">Early Work</th>

                {{-- <th scope="col">Action</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($carrerapplicants as $key=>$carrerapplicant)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$carrerapplicant->student->Fname}}</td>
                  <td>{{$carrerapplicant->student->Lname}}</td>
                  <td>{{$carrerapplicant->student->email}}</td>
                  <td>{{$carrerapplicant->student->phone}}</td>
                  <td>{{$carrerapplicant->student->spacialSkill}}</td>
                  <td>{{$carrerapplicant->position->title}}</td>
                  <td><img style="width: 100px" src="{{asset($carrerapplicant->student->recomendation)}}" alt="">
                    <a href="{{url('download',$carrerapplicant->student->id)}}">download</a></td>
                   <td><a href="{{url('/inviteApplicant',$carrerapplicant->student->id)}}" class="btn btn-success">Invite</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
