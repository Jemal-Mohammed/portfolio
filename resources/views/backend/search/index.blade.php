

@extends('backend.master')
@section('content')
<section class="section dashboard">
    {{$posts}}
    @if($posts->isNotEmpty())
        <div class="post-list">
            @if (url()->previous()=='http://localhost:8000/allpositions')
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Title</th>
                    <th scope="col">Address</th>
                    <th scope="col">Company</th>
                    <th scope="col">city</th>
                    <th scope="col">Action</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$post->title}}</td>
                      <td>{{$post->address}}</td>
                      <td>{{$post->companyName}}</td>
                      <td>{{$post->city}}</td>



                    </tr>


                    @endforeach
                </tbody>
              </table>

            @endif
            @if (url()->previous()=='http://localhost:8000/allSupervisors')
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$post->Fname}}</td>
                      <td>{{$post->Lname}}</td>
                      <td>{{$post->email}}</td>
                      <td>{{$post->role}}</td>



                    </tr>


                    @endforeach
                </tbody>
              </table>

            @endif
            @if (url()->previous()=='http://localhost:8000/assignedStudents')
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$post->Fname}}</td>
                      <td>{{$post->Lname}}</td>
                      <td>{{$post->email}}</td>
                      <td>{{$post->role}}</td>



                    </tr>


                    @endforeach
                </tbody>
              </table>

            @endif
            @if (url()->previous()=='http://localhost:8000/allCarrers')
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Company Name </th>
                    <th scope="col">work Area </th>
                    <th scope="col">Address</th>
                    <th scope="col">city</th>
                    <th scope="col">Salary</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key=>$post)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$post->companyName}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->address}}</td>
                      <td>{{$post->city}}</td>
                      <td>{{$post->salery}}</td>




                    </tr>


                    @endforeach
                </tbody>
              </table>

            @endif
        </div>
        @else
        <div>

        <h2>Search result Not found</h2>
    </div>
@endif

        </section>
      <!-- Small modal -->

@endsection
