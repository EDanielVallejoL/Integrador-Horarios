@extends('layouts.app')

@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="cardColor">
                <div class="card-header">{{ __('Crea una cuenta') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h1>Baro</h1>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('name') }}" required autocomplete="lastname" autofocus placeholder="Apellido">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="ciudad" type="text" class="form-control" name="city" required autocomplete="ciudad" placeholder="Ciudad">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma contraseña">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="start">Fecha de nacimiento:</label>

                                    <input type="date" id="start" name="trip-start" value="1997-11-23" min="1950-01-01" max="2018-12-31">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item">Mujer
                                            <input type="radio" name="radio" id="Mujer" value="1" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Hombre
                                            <input type="radio" name="radio" id="Hombre" value="2" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Personalizado
                                            <input type="radio" name="radio" id="Personalizado" value="3" onclick="habilitar(this)">
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear cuenta nueva') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection