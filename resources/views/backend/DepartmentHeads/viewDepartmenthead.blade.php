@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Department Heads</h5>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <!--  <th scope="col">Action</th> -->
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$user->Fname}}</td>
                  <td>{{$user->Lname}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->status}}</td>
                  @if (session('user')->role=='coordinator')
                  <td><a class="badge bg-success" href="{{url('ActivateDH',$user->id)}}">Activate</a></td>
                  <td><a class="badge bg-danger" href="{{url('DeactivateDH',$user->id)}}">DeActivate</a></td>
                  @endif
                  @if (session('user')->role=='coordinator')
                  <td><a id="delete" class="btn btn-danger" href="{{url('deleteDepartmentHead',$user->id)}}">Delete</a></td>
                  @endif
                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
