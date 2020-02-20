@extends('layouts.base')

@section('title', 'Publicaciones')

@section('content')

<div class="card mb-3">
    <div class="card-body">
        <a class="btn cardColor1 btn-block" href="/posts/create" role="button">Crear publicacion</a>
    </div>
</div>

@if (count($posts) > 0)
@foreach ($posts as $post)
<div class="card mb-3">
    <img class=" img-fluid" src="https://picsum.photos/600?random={{$post->id}}" alt="Card image cap">
    <div class="card-body">
        <a class="card-title h3 text-dark" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        <p class="card-text display-5">En <strong> {{ $post->category }}</strong>  </p>
        <a class="card-text display-5 text-muted" href="/users/{{ $post->user_id }}">{{ $authors[$post->user_id - 1]->name }}</a>

        <p class="card-text">{{ $post->description }}</p>
        
        <div class="form-inline">
            <form action="/comments/{{ $post->id }}" method="POST">
                <input type="text" class="mr-3 list-group-item form-control" placeholder="Agregar comentario..." name="description">
                @csrf
                @method('patch')
                {{-- Hacer un cuadro de confirmacion aqui --}}
                <button type="submit" class="btn btn-success mr-3">Comentar</button>
            </form>
            <a href="/posts/{{ $post->id }}/edit" class="btn mr-3 btn-warning">Editar post</a>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('delete')
                {{-- Hacer un cuadro de confirmacion aqui --}}
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endforeach
@else
<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title">No hay publicaciones</h3>
    </div>
</div>
@endif  
<!-- Publicaciones -->



@endsection 