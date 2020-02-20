@extends('layouts.base')

@section('title', 'Crear publicacion')

@section('content')

<!-- Publicaciones -->
@if (count($forums) > 0)

<div class="card mb-3">
    <div class="card-body">
        <form action="/posts" method="POST">
            @csrf
            <input type="text" class="mb-3 form-control" placeholder="Titulo" name="title">
            <select class="form-control mb-3" name="category" id="category">
                @foreach ($forums as $forum)
                    <option value="{{ $forum->name }}">{{ $forum->name }}</option>
                @endforeach
            </select>
            <textarea class="form-control mb-3" name="description" id="description" cols="20" rows="5" placeholder="Descripcion"></textarea>
            {{-- <div class="custom-file mb-3"> --}}
                {{-- <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> --}}
                {{-- <label class="custom-file-label" for="inputGroupFile01">Subir foto</label> --}}
            {{-- </div> --}}

            <input type="text" hidden name="forum_id" value="{{ $forum->id }}">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/posts" class="btn btn-danger">Cancelar</a>
            {{-- <button type="button" class="btn btn-success align-self-end">Guardar</button> --}}
        </form>
    </div>
</div>
    
@else
    
<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title">No hay foros disponibles</h3>
    </div>
</div>

@endif

@endsection

@section('extra', '<script src="js/app.js"></script>')