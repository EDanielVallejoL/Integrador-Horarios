@extends('layouts.base')

@section('title', 'Lista de foros')

@section('content')



<!-- Publicaciones -->

@if (!\App\User::find(Auth::id())->is_forum_admin)
    @if (count($forums) > 0)
    @foreach ($forums as $forum)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row no-gutters">
                <div class="col-md-9">
                    <a class="card-title h5" href="/forums/{{ $forum->id }}">{{ $forum->name }}</a>
                    <p class="card-text">{{ $forum->description }}</p>
                </div>

            </div>
        </div>
    </div> 
    @endforeach
    @else
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">No hay foros</h3>
        </div>
    </div>
    @endif

@else

<div class="card mb-3">
    <div class="card-body">
        <a class="btn btn-info btn-block" href="/forums/create" role="button">Crear foro</a>
    </div>
</div>
@foreach ($forums as $forum)
    
<div class="card mb-3">
    <div class="card-body">
        <div class="row no-gutters">
            <div class="col-md-9">
                <h5 class="card-title">{{ $forum->name }}</h5>
                <p class="card-text">{{ $forum->description }}</p>
            </div>
            <div class="col-md-3">
                <a href="/forums/{{ $forum->id }}" class="btn btn-block btn-primary">Ver foro</a>
                <a href="/forums/{{ $forum->id }}/edit" class="btn btn-block btn-warning">Editar foro</a>
                
                <form action="/forums/{{ $forum->id }}" method="POST">
                    @csrf
                    @method('delete')
                    {{-- Hacer un cuadro de confirmacion aqui --}}
                    <button type="submit" class="btn btn-block mt-2 btn-danger">Eliminar foro</button>
                </form>
                <!--<a href="foro" class="btn btn-block btn-danger">Eliminar foro</a>-->
                 
            </div>
        </div>
    </div>
</div>  
@endforeach
@endif 

@endsection