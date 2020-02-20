@extends('layouts.base2')

<!--PAGINA DE PERFIL SE PUEDE RECICLAR-->

@section('title', 'Petbook')

@section('content')

<div class="row">
    <div class="card w-100">
        <img class="img-fluid" src="https://picsum.photos/300" alt="Petito">
        <div class="card-body">
            <h4 class="card-title ">{{ $user->name }}</h4>
            <div class="form-inline">
                <a href="/pet" class="mr-3 btn btn-outline-success ">Mascotas</a>
                <a href="/pets/create" class="ml-3 btn btn-outline-success">Agregar mascota</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12 col-md-4">
        <!-- Presentación -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Presentación</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">De: {{ $user->city }}</li>
                <li class="list-group-item">Email: {{ $user->email }}</li>
            </ul>
        </div>
        <!-- Amigos -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Mascotas</h5>
            </div>

            <tbody>

                <table border="1" cellpadding="10">
                    @for ($i = 0; $i < count($pets); $i++) @if($i % 2==0) <tr>
                        <td>
                            <div class="card" style="width: 6rem;">
                                <img src="https://picsum.photos/{{$i}}00" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-title h6">{{ $pets[$i]->name }}</p>
                                </div>
                            </div>
                        </td>
                        @else
                        <td>
                            <div class="card" style="width: 7rem;">
                                <img src="https://picsum.photos/{{$i+3}}00" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-title h6">{{ $pets[$i]->name }}</p>
                                </div>
                            </div>
                        </td>
                        @endif
                        @endfor
                        </tr>
                </table>



            </tbody>
        </div>
        <!-- Contacto -->
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h5 class="card-title">Contacto</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Creadores</li>
                <li class="list-group-item">Oscar Patiño</li>
                <li class="list-group-item">Jonathan Baro</li>
                <li class="list-group-item">Petbook© 2019</li>
            </ul>
        </div>
    </div>
    @foreach ($posts as $post)
    @if ($post->user_id == Auth::id())
        <div class="col-md-8 col-sm-12">
            <div class="card mb-3">
            <img class=" img-fluid" src="https://picsum.photos/600" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text display-5">En categoria: <strong> {{ $post->category }}</strong>  </p>
                <p class="card-text text-muted display-5">Autor: {{ \App\User::find(Auth::id())->name }}</p>

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
        
            </div>
        </div>
                
    </div>
    @endif

    @endforeach
    
</div>

@endsection