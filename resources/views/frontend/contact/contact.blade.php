{{-- @extends('frontend.welcome')
@section('contact') --}}

<div class="row">
<div class="col-md-12">
    <h1>Contact us</h1>
    <form action="{{url('contact')}}" method="POST" >
        @csrf
        <div class="form-grop">
                <input type="text" class="form-control" name="name" placeholder="Enter Name"><br>
                @if ($errors->has('name'))
                <h5 class="text-danger">*{{$errors->first('name')}}</h5>
                @endif
        </div>
        <div class="form-grop">
            <input type="text" class="form-control" name="email" placeholder="Enter Email"><br>
            @if ($errors->has('email'))
            <h5 class="text-danger">*{{$errors->first('email')}}</h5>
            @endif
    </div>
    <div class="form-grop">
        <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea><br>
        @if ($errors->has('message'))
        <h5 class="text-danger">*{{$errors->first('message')}}</h5>
        @endif
</div>
<div class="form-grop">
    <input type="submit"   class="btn btn-success btn block" placeholder="Enter Name"><br>
</div>
    </form>

</div>


  </div>

{{-- @endsection --}}
