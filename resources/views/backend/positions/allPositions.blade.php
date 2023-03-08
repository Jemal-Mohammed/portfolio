@extends('backend.master')
@section('content')
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Table with hoverable rows</h5>

          <!-- Table with hoverable rows -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">company Name</th>
                <th scope="col">Supervisor Name</th>
                <th scope="col">position Title</th>
                <th scope="col">Company Address</th>
                <th scope="col">City</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($positions as $key=>$position)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$position->companyName}}</td>
                 @if(session('user')->role=='supervisor')
                  <td>{{session('user')->name}}</td>
                  @endif
                  <td>{{$position->title}}</td>
                  <td>{{$position->address}}</td>
                  <td>{{$position->city}}</td>
                  <td>{{$position->applicantNumber}}</td>
                  @if (session('user')->role=='supervisor')

                  {{-- <td><a  id="delete" class="btn btn-danger" href="{{route('remove',$position->id)}}">Delete</a></td> --}}
                  @endif

                </tr>
                @endforeach
            </tbody>
          </table>
  </section>
@endsection
