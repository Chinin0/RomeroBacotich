@extends('layouts.auth_app')
@section('title')
Admin Login
@endsection
@section('content')

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/a2dd6045c4.js" crossorigin="anonuymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background: url('https://img.freepik.com/fotos-premium/lapices-boligrafos-coloridos_23-2147650791.jpg?size=626&ext=jpg') no-repeat center center;
            background-position: center;
            background-size: cover;
        }

        .contenedor {
            position: relative;
            width: 400px;
            border: 2px solid rgba(255, 255, 255, .6);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Fondo blanco semitransparente */
        }

        .login-brand {
            margin-bottom: 20px;
        }

        .contenedor h2 {
            font-size: 2.3rem;
            color: black;
            text-align: center;
        }

        .input-contenedor {
            position: relative;
            margin: 30px 0;
            width: 300px;
            border-bottom: 2px solid black;
        }

        .input-contenedor label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: black;
            font-size: 1rem;
            pointer-events: none;
            transition: .6s;
            font-weight: bold;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        .input-contenedor input {
            width: 100%;
            height: 50px;
            background-color: transparent;
            border: none;
            outline: none;
            font-size: 1rem;
            padding: 0 35px 0 5px;
            color: black;
        }

        .input-contenedor i {
            position: absolute;
            color: black;
            font-size: 1.6rem;
            top: 19px;
            right: 8px;
        }

        .olvidar {
            margin: -15px 0 15px;
            font-size: .9em;
            color: black;
            display: flex;
            justify-content: center;
        }

        .olvidar label input {
            margin: 3px;
        }

        .olvidar label a {
            color: black;
            text-decoration: none;
            transition: .3s;
            font-size: .9em;
        }

        .olvidar label a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            height: 45px;
            border-radius: 40px;
            background-color: #fff;
            border: none;
            font-weight: bold;
            cursor: pointer;
            outline: none;
            font-size: 1rem;
            transition: .4s;
        }

        button:hover {
            opacity: .9;
        }

        .registrar {
            font-size: .8rem;
            color: black;
            text-align: center;
            margin: 20px 0 10px;
        }

        .registrar p a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: .3s;
        }

        .registrar p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<div class="contenedor">
    
    <div class="formulario">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger p-0">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Iniciar Sesión</h2>
            <div class="input-contenedor">
                <i class="fa-solid fa-envelope"></i>
                <input aria-describedby="emailHelpBlock" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" tabindex="1" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus required>
                <label for="email"> Email</label>
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="input-contenedor">
                <i class="fa-solid fa-lock"></i>
                <input aria-describedby="passwordHelpBlock" id="password" type="password" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2" required>
                <label for="password"> Contraseña</label>
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="olvidar">
                <label for="remember">
                    <input type="checkbox" name="remember"> Recordar
                    <a href="{{ route('password.request') }}">Olvidé la contraseña</a>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-custom" tabindex="4" style="background-color: green;">
                    Login
                </button>
            </div>
        </form>
        <div>
            <div class="registrar">
                <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
            </div>
        </div>
    </div>
</div>
</section>
@endsection