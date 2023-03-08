

@extends('backend.master')
@section('content')
<section class="section dashboard">
     <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>Give Result and Recomendation(if neccessary)</h1>
                <form action="{{url('assignResult',$student->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
                    <div class="form-group">
                       <input type="text" name="apparentResult" placeholder="Enter Apparent Result" id="" class="form-control"  >
                    </div><br>
                    <input type="file" name="recomendation" placeholder="Enter Apparent Result" id="" class="form-control"  >
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
