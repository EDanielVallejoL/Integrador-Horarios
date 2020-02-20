@extends('layouts.base')

@section('title', $post->title)

@section('content')

<!-- Una sola publicación -->
<div class="card mb-3">
    <img class=" img-fluid" src="https://picsum.photos/600" alt="Card image cap">
    <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <p class="card-text display-5">En categoria: <strong> {{ $post->category }}</strong>  </p>
        <p class="card-text text-muted display-5">Autor: {{ $author }}</p>

        <p class="card-text">  {{  $post->description }}</p>
        
        <div class="form-inline">
            <form action="/comments/{{ $post->id }}" method="POST">
                <input type="text" class="mb-3 mr-3 form-control" placeholder="Agregar comentario..." name="description">
                @csrf
                @method('patch')
                {{-- Hacer un cuadro de confirmacion aqui --}}
                <button type="submit" class="btn btn-success mb-3 mr-3">Comentar</button>
            </form>
            <a href="/posts/{{ $post->id }}/edit" class="btn mr-3 mb-3 btn-warning">Editar post</a>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('delete')
                {{-- Hacer un cuadro de confirmacion aqui --}}
                <button type="submit" class="btn mb-3 btn-danger">Eliminar</button>
            </form>

        </div>
        <p class="h4">Comentarios</p>
        <ul class="list-group list-group-flush">
            @foreach ($comments as $comment)
                <li class="list-group-item">
                    <strong>{{ \App\User::find($comment->user_id)->name }}</strong></br>
                    {{ $comment->description }}
                    @if (\App\User::find(Auth::id())->is_moderator)
                        <form action="/comments/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">X</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection 