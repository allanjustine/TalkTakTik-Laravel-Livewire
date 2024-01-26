@extends('base')

@section('content')

@section('title', 'Log in')
<body>
    <div class="container col-md-4 offset-md-4">
        <div class="col-sm-8 offset-sm-2">
            <img src="images/login-logo.png" alt="logo" title="TalkTikTak Logo" class="img-fluid mb-1 rounded-circle img-responsive center-block d-block mx-auto">
        </div>
        @if (session('message'))
        <div id="messagee" class="alert alert-success text-center">{{ session('message') }}</div>
        @endif
        @if (session('error'))
        <div id="messagee" class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <div class="card shadow mb-5 rounded border border-light">
            <div class="card-body" id="card-bodyy">
                <h2 class="text-center mb-4 text-white">LOG IN</h2>
                <form action="{{ '/' }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group mb-3 mt-1 col-sm-10 offset-sm-1">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required="">
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-5 mt-1 col-sm-10 offset-sm-1">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" required="">
                        <span class="input-group-text" id="basic-addon1" type="show" style="width: 40px; cursor: pointer;" onclick="myFunction()"><i class="fa fa-eye" id="eye"></i></span>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <a href="{{ '/register' }}" class="text-white">Sign up for an account</a>
                        </div>
                        <button class="btn btn-primary px-5" type="submit">Login</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>

@endsection

<style>
#basic-addon1 {
    width: 40px;
    text-align: center;
}
body{
    background-image: url("images/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100%;
}
#card-bodyy {
    background-image: linear-gradient(to right, rgb(99, 34, 228), rgb(19, 131, 65));
}
#eye:active {
    color: blue;
}
</style>

<script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
