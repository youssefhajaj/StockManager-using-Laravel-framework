{{-- @extends('layouts.app')

@section('content') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #11061b;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
.button_submit:hover{
    background: #ffb44b;
}
form{
    height: fit-content;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 0 35px;
}
.register{
    font-size: 20px;
    text-decoration: none;
}
.register:hover{
    font-weight: 700;
    color: #ffffff;
}
.f{
    font-size: 15px;
    text-decoration: none;
}
.f:hover{
    font-weight: 500;
    color: #ffffff;
    text-decoration: underline;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 30px;
    letter-spacing: 0.3px;
    margin-top: 30px;
    text-align: center;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

label{
    display: block;
    margin-top: 10px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin: 5px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 20px;
    width: 100%;
    background-color: #f09819;
    color: #080710;
    padding: 8px 0;
    font-size: 18px;
    font-weight: 900;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 20px;
  margin-bottom: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: #1845ad;
  color: #eaf0fb;
  text-align: center;
  cursor: pointer;
}
.social div:hover{
  background-color: #255bd8;
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.password{
    margin-bottom: 15px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h3>Login</h3>

        {{-- <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username"> --}}

        <label for="username">Email</label>
        <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        {{-- <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password"> --}}
        <label for="password">Mot de passe</label>
        <input id="password" placeholder="mot de passe" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        {{-- <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="" for="remember">
                                    {{ __('Remember Me') }}
                                </label> --}}

        {{-- <button>Log In</button> --}}

        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}

        <button type="submit" class="button_submit">
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
                                    <a class="f" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
        <div class="social">
          <div class="go"><a class="register" href="{{route('register')}}">S'inscrire</a></div>
        </div>
        

        
    </form>
</body>
</html>

{{-- @endsection --}}
