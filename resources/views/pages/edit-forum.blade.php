@extends('layouts.base')

@section('title', 'Editar foro')

@section('content')

<!-- Publicaciones -->
<div class="card mb-3">
    <div class="card-body">
        <form action="/forums/{{ $forum->id }}" method="POST">
            @csrf
            @method('patch') {{-- Se establece aqui el metodo patch que actualiza --}}

            <input type="text" class="mb-3 form-control" placeholder="Nombre del foro" name="name" value="{{ $forum->name }}">
            <input type="text" class="mb-3 form-control" placeholder="Descripción" name="description" value="{{ $forum->description }}">
         
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/forums" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>

@endsection

@section('extra', '<script src="js/app.js"></script>')