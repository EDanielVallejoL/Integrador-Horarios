@extends('layouts.app')

@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="cardColor">
                <div class="card-header">{{ __('Crea una cuenta') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <form method="POST" action="{{ route('registerPet ') }}">
                            @csrf

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
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item">Perro
                                            <input type="radio" name="radio" id="Perro" value="1" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Gato
                                            <input type="radio" name="radio" id="Gato" value="2" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Hamster
                                            <input type="radio" name="radio" id="Hamster" value="3" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Ruedor
                                            <input type="radio" name="radio" id="Ruedor" value="4" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Insecto
                                            <input type="radio" name="radio" id="Insecto" value="5" onclick="habilitar(this)">
                                        </li>
                                    </ul>
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
                                        <li class="list-group-item">Hembra
                                            <input type="radio" name="radio" id="Hembra" value="1" onclick="habilitar(this)">
                                        </li>
                                        <li class="list-group-item">Macho
                                            <input type="radio" name="radio" id="Macho" value="2" onclick="habilitar(this)">
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar mascota') }}
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