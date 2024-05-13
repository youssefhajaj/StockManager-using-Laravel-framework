{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white;
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
    left: -160px;
    top: -65px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -140px;
    bottom: -20px;
}
.button_submit:hover{
    background: #ffb44b;
}
        body{
            display: flex;
            padding: 30px 0;
            justify-content: center;
            width: 100%;
            height: 100vh;
            background-size: 100%;
            background-repeat: no-repeat; 
        }
        .container{
            width: 500px;
            height: fit-content;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 10px;
            margin-top: 60px;
        }
        .container form{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 9px;
            width: 400px;
        }
        .container form > input{
            width: 100%;
            padding: 10px 15px;
            border: none;
            background: transparent;
            
            font-size: 20px;
            font-weight: 600px;
            border: none;
            border-bottom: 1px solid rgb(49, 49, 49);
        }
        ::placeholder{
            color: rgb(212, 212, 212);   
        }
        .container form > button{
            border: none;
            outline: none;
            padding: 10px 10px;
            border-radius: 5px;
            font-size: 25px;
            font-weight: 900;
            letter-spacing: 0.8px;
            background: rgb(255, 81, 0);
            color: rgb(0, 0, 0);
            cursor: pointer;
            margin: 20px 0;
            padding: 10px 30px;
            width: fit-content;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container form > a{
            color: rgb(0, 0, 0);
            font-size: 20px;
            font-weight: 600;
            margin-left: 250px;
            text-decoration: none;
        }
        .container form > a:hover{
            text-decoration: underline;
        }
        .container form > button:hover{
            background: rgb(255, 111, 45);
        }
        .container > h2{
            margin: 20px 0;
            font-weight: 700;   
            font-size: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">

        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <h2>Reset mot de passe</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            
                    <input placeholder="nouveau mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input placeholder="confirmer mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

            <a href="{{route('login')}}">login</a>
            <button type="Confirmer" class="btn btn-primary">
                Envoyer
            </button>

        </form>
        {{-- ********************************************** --}}

        {{-- <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form> --}}

    </div>
    
</body>
</html>