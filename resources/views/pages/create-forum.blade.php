@extends('layouts.base')

@section('title', 'Crear foro')

@section('content')

<!-- Publicaciones -->
<div class="card mb-3">
    <div class="card-body">
        <form action="/forums" method="POST">
            @csrf
            <input type="text" class="mb-3 form-control" placeholder="Nombre del foro" name="name">
            <input type="text" class="mb-3 form-control" placeholder="Descripción" name="description">
         
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/forums" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>

@endsection

@section('extra', '<script src="js/app.js"></script>')