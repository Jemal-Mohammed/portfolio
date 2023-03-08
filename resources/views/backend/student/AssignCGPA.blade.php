

@extends('backend.master')
@section('content')
<section class="section dashboard">
     <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{url('assignCGPA',$student->id)}}" method="POST">
                 @csrf
                    <div class="form-group">
                       <input type="text" name="CGPA" id="" class="form-control" value="{{$student->CGPA}}">
                    </div><br>
                    <div class="form-group">
                        <input type="submit"   id="" class="btn btn-primary">
                     </div>
                </form>
            </div>
        </div>
     </div>


        </section>
      <!-- Small modal -->

@endsection
