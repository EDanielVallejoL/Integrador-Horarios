<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosManuales.css">
    <title>TimeBlock</title>
</head>
<body>

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
                </div >        
                <div class="form-check mt-4">	
                    @if (Route::has('register'))	
                        <a class="btn btn-block mb-3  cardColor3 text-light btn btn-dark cardColor2 ingresar " href="{{ route('register') }}">{{ __('Regístrate') }}</a>	
                    @endif	
                </div >        
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>