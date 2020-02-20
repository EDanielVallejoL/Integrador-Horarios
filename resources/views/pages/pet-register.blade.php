@extends('layouts.base2')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card" id="cardColor">
            <div class="card-header">{{ __('Agrega una mascota a tu perfil') }}</div>

            <div class="card-body">

                <form action="/pets" method="post">
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
                            <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="name" autofocus placeholder="Color de la mascota">

                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="race" type="text" class="form-control @error('race') is-invalid @enderror" name="race" value="{{ old('race') }}" required autocomplete="name" autofocus placeholder="Raza">

                            @error('race')
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
                                    <input type="radio" name="specie" id="Perro" value="1" onclick="habilitar(this)">
                                </li>
                                <li class="list-group-item">Gato
                                    <input type="radio" name="specie" id="Gato" value="2" onclick="habilitar(this)">
                                </li>
                                <li class="list-group-item">Hamster
                                    <input type="radio" name="specie" id="Hamster" value="3" onclick="habilitar(this)">
                                </li>
                                <li class="list-group-item">Ruedor
                                    <input type="radio" name="specie" id="Ruedor" value="4" onclick="habilitar(this)">
                                </li>
                                <li class="list-group-item">Insecto
                                    <input type="radio" name="specie" id="Insecto" value="5" onclick="habilitar(this)">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="start">Fecha de nacimiento:</label>

                            <input type="date" id="start" name="trip-start" value="2018-11-23" min="2000-01-01" max="2018-12-31">
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
                    -->

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">Agregar</button>
                            <a href="/users/{{Auth::id()}}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection