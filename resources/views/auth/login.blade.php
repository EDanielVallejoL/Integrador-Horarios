@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="col-md-4 formulario">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group text-center">
                    <h1 class="text-light">Iniciar Sesión</h1>
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electrónico">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        <h6 class="text-light">Guardar Sesión</h6>
                    </label>
                </div>
                <div class="form-check">
                    <button type="submit" class="btn btn-block mb-3  cardColor3 text-light btn btn-dark cardColor2 ingresar " href="{{ route('password.request') }}">
                        {{ __('Iniciar sesión') }}
                    </button>

                    @if (Route::has('password.request'))
                    <div>
                        <a class="btn btn-dark cardColor2 btn-block" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>

                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection