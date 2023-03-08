@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Departments</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
        @if (session('user')->role=='coordinator')

                <th   scope="col">Action</th>
@endif

              </tr>
            </thead>
            <tbody>
                @foreach ($departments as $key=>$department)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$department->name}}</td>
        @if (session('user')->role=='coordinator')

        <td><a id="delete" class="btn btn-danger" href="{{url('deleteDepartment',$department->id)}}">Delete</a></td>
        @endif

                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection

