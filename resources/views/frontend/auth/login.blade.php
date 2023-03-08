<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="{{asset('login/css/style.css')}}" rel="stylesheet">
      {{-- stoasters --}}
  <script src="https://kit.fontawesome.com/07e6377223.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
<body  >

    <div class="container mt-5">

        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                    <a class="text-center" href="index.html"> <h4>Log In</h4></a>

                                    <form id="form" method="POST" action="{{url('authenticate')}}" class="mt-5 mb-5 login-input">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="text" name="username"  onkeydown="javascript:validation()" class="form-control" placeholder="User Name">
                                            <span id="text"></span>
                                            @if ($errors->has('username'))
                                            <h5 class="text-danger">*{{$errors->first('username')}}</h5>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            @if ($errors->has('password'))
                                            <h5 class="text-danger">*{{$errors->first('password')}}</h5>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="role" id="">
                                              <option value="">--Select Role--</option>
                                              <option value="admin">Admin</option>
                                              <option value="coordinator">coordinator</option>
                                              <option value="supervisor">supervisor</option>
                                              <option value="head">department head</option>
                                              <option value="student">student</option>
                                            </select>
                                            @if ($errors->has('role'))
                                            <h5 class="text-danger">*{{$errors->first('role')}}</h5>
                                            @endif
                                          </div>
                                        <button class="btn login-form__btn submit w-100">Sign In</button>
                                    </form>
                                    <p class="mt-5 login-form__footer">Dont have account? <a href="{{url('/signUp')}}" class="text-primary">Sign Up</a> now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      {{-- validation --}}
      <script>
        function validation(){
            var form=document.getElementById('form');
            var email=document.getElementById('email').value;
            var text=document.getElementById('text');
            var pattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

if(email.match(pattern)){
    form.classList.add("valid");
    form.classList.remove("invalid");
text.innerHTML='valid Email Adderss';
text.style.color='#00ff00';

}


else{
    form.classList.remove("valid");
    form.classList.add("invalid");
text.innerHTML='invalid Email Adderss';
text.style.color='#ff0000';
}
if(email==''){
    form.classList.remove('valid');
    form.classList.remove('invalid');
    text.innerHTML='';
    text.style.color='#00ff00';


}
        }
      </script>
      {{-- -- toaster start --}}
      <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
                // return false;
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>
      {{-- toaster end --}}

  {{-- modal --}}
  <script src="{{asset('js/custom.min.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/gleek.js')}}"></script>
  <script src="{{asset('js/styleSwitcher.js')}}"></script>
    <!-- Toastr -->
    <script src="{{('plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{('plugins/toastr/js/toastr.init.js')}}"></script>

</body>
</html>
