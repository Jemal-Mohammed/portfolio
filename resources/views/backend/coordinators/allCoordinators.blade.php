@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Coordinators</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th  colspan="3" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($coordinators as $key=>$coordinator)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$coordinator->Fname}}</td>
                  <td>{{$coordinator->Lname}}</td>
                  <td>{{$coordinator->email}}</td>
                  <td>{{$coordinator->role}}</td>
                  <td>{{$coordinator->status}}</td>
                  <td><a class="badge bg-success" href="{{url('ActivateCoordinator',$coordinator->id)}}">Activate</a></td>
                  <td><a class="badge bg-danger" href="{{url('DeactivateCoordinator',$coordinator->id)}}">DeActivate</a></td>
                  <td><a  class="btn btn-danger" href="{{url('DeleteCoordinator',$coordinator->id)}}" >Delete</a></td>

                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
