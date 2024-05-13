{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">



                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                    {{ __('Register') }}
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
            color: rgb(255, 255, 255);
        }
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
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            background-size: 100%;
            background-repeat: no-repeat; 
        }
        .container{
            width: 400px;
            height: fit-content;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container form{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            width: 300px;
        }
        /* .container form > input{
            width: 100%;
            padding: 6px 15px;
            border: 1px solid gray;
            border-radius: 5px;
            font-size: 20px;
            font-weight: 600px;
        } */
        .container form > input{
            width: 100%;
            padding: 5px 15px;
            border: none;
            background: transparent;
            color: #fff;
            font-size: 22px;
            border: none;
            border-bottom: 1px solid rgb(48, 48, 48);
        }
        .container form > input:focus{
            border: none;
            border-bottom: 1.5px solid rgb(32, 32, 32);

            outline: none;
        }
        ::placeholder{
            color: rgb(192, 192, 192);   
        }

        .container form > button{
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 25px;
            font-weight: 900;
            letter-spacing: 0.8px;
            background: purple;
            color: white;
            cursor: pointer;
            margin-bottom: 20px;
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container form > a{
            color: rgb(0, 11, 105);
            font-size: 15px;
            font-weight: 600;
            margin-left: 150px;
            margin-top: -5px;
            text-decoration: none;
        }
        .container form > a:hover{
            text-decoration: underline;
        }
        .container form > button:hover{
            background: rgb(70, 0, 70);
        }
        .container > h2{
            color: rgb(255, 255, 255);
            margin: 20px 0;
            font-weight: 700;   
            font-size: 30px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container .fullname{
            display: flex;
            justify-content: center;
            width: 100%;
            gap: 20px;
        }
        .container .fullname *{
            padding: 5px 15px;
            border: none;
            background: transparent;
            
            font-size: 20px;
            font-weight: 600px;
            border: none;
            border-bottom: 1px solid rgb(48, 48, 48);
            width: 135px;
        }
        .container .fullname *{
            border: none;
            outline: none;
            border-bottom: 1px solid rgb(48, 48, 48);
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <h2>Registre</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="fullname">
                <input placeholder="nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input placeholder="prenom" id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            
            <input placeholder="telephone" id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input style="color: rgb(196, 196, 196);" placeholder="dateNaissance" id="dateNaissance" type="date" class="form-control @error('dateNaissance') is-invalid @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}" required autocomplete="dateNaissance">

                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input placeholder="mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input placeholder="confirmer mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <a href="{{route('login')}}">Login</a>
            

            <button type="submit" class="btn btn-primary">
                Valider
            </button>

        </form>
    </div>
    
</body>
</html>