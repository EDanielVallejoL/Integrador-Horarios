@extends('layouts.base')

@section('title', 'Editar publicacion')

@section('content')

<!-- Publicaciones -->

<div class="card mb-3">
    <div class="card-body">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" class="mb-3 form-control" placeholder="Titulo" name="title" value="{{ $post->title }}">
            <textarea class="form-control mb-3" name="description" id="description" cols="20" rows="5" placeholder="Descripcion">{{ $post->description }}</textarea>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/posts" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>

@endsection

@section('extra', '<script src="js/app.js"></script>')