@extends('layouts.base')

@section('title', 'Pagina principal')


@section('content')

<div class="card mb-3">
    <div class="card-body">
        <a class="btn btn-info" href="crea-publicacion" role="button">Crear publicacion</a>
    </div>
</div>
<!-- Publicaciones -->
<div class="card">
    <img class=" img-fluid" src="https://picsum.photos/600" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">Titulo de la publicación</h4>

        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, quod esse aperiam pariatur minima est ad excepturi perferendis dolorem fugiat.</p>

        <form class="form-inline">
            <input type="text" class="mr-3 list-group-item form-control" placeholder="Agregar comentario...">
            <button class="btn btn-success">Comentar</button>
        </form>
    </div>
</div>

@endsection