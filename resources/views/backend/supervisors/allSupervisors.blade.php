@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Supervisors</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <!--  <th scope="col">Action</th>-->
              </tr>
            </thead>
            <tbody>
                @foreach ($supervisors as $key=>$supervisor)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$supervisor->Fname}}</td>
                  <td>{{$supervisor->Lname}}</td>
                  <td>{{$supervisor->email}}</td>
                  <td>{{$supervisor->role}}</td>
                  @if (session('user')->role=='coordinator')
                  <td><a class="badge bg-success" href="{{url('ActivateSupervisor',$supervisor->id)}}">Activate</a></td>
                  <td><a class="badge bg-danger" href="{{url('DectivateSupervisor',$supervisor->id)}}">DeActivate</a></td>
                   @endif
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
