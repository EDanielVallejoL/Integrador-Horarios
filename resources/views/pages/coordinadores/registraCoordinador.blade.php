@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 mr-1">
        <div class="row justify-content-centerv formulario2">
            <form method="POST" action="{{ url('/coordinador') }}" enctype="multipart/form-data">
                @csrf
                <h1 class="text-light">Registrar Coordinador</h1>
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
                        <input id="carrera" type="text" class="form-control" name="carrera" required autocomplete="ciudad" placeholder="Carrera">
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
                <div class="">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-center">
                            {{ __('Crear cuenta nueva') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection