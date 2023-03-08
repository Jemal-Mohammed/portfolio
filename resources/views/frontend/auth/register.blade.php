<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registraton</title>
    <link href="{{asset('login/css/style.css')}}" rel="stylesheet">

</head>
<body>

    <div class="container mt-5">

        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                 <h4 class="row justify-content-center text-primary">Registraton</h4>
                                    <form action="{{url('register')}}" class="mt-5 mb-5 login-input">
                                        <div class="form-group">
                                            <input type="text" name="Fname" class="form-control" placeholder="First Name">
                                            @if ($errors->has('Fname'))
                                            <h5 class="text-danger">*{{$errors->first('Fname')}}</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="Lname" class="form-control" placeholder="Last Name">
                                            @if ($errors->has('Lname'))
                                            <h5 class="text-danger">*{{$errors->first('Lname')}}</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                            @if ($errors->has('email'))
                                            <h5 class="text-danger">*{{$errors->first('email')}}</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="University Id">
                                            @if ($errors->has('username'))
                                            <h5 class="text-danger">*{{$errors->first('username')}}</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control" name="department_id" id="">
                                            <option value="">--Select Department--</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach

                                          </select>
                                          @if ($errors->has('department_id'))
                                          <h5 class="text-danger">*{{$errors->first('department_id')}}</h5>
                                          @endif
                                        </div>
                                        <button type="submit" class="btn login-form__btn submit w-100">Sign Up</button>
                                    </form>
                                    <p class="mt-5 login-form__footer">Dont have account? <a href="{{url('/signIn')}}" class="text-primary">Sign In</a> now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{-- modal --}}
  <script src="{{asset('js/custom.min.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/gleek.js')}}"></script>
  <script src="{{asset('js/styleSwitcher.js')}}"></script>
</body>
</html>
