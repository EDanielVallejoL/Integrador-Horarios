@extends('layouts.base2')

@section('title', 'Petbook')

@section('content')

<div class="row mt-3">

    @if(count($pets) != 0)
    <div class="col-md-12 d-none d-lg-block d-xl-block">
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Mascotas</h5>
            </div>
            <table border="1" cellpadding="10">
                @for ($i = 0; $i < count($pets); $i++) @if($i % 3==0) <tr>
                    <td>
                        <div class="card" style="width: 13rem;">
                            <img src="https://picsum.photos/{{$i}}00" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <p class="card-title h6">Nombre: {{ $pets[$i]->name }}</p>
                                <p class="card-title h6">Color: {{ $pets[$i]->color }}</p>
                                <p class="card-title h6">Raza:{{ $pets[$i]->race }}</p>
                            </div>
                        </div>
                    </td>
                    @else
                    <td>
                        <div class="card" style="width: 14rem;">
                            <img src="https://picsum.photos/{{$i+2}}00" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <p class="card-title h6">Nombre: {{ $pets[$i]->name }}</p>
                                <p class="card-title h6">Color: {{ $pets[$i]->color }}</p>
                                <p class="card-title h6">Raza:{{ $pets[$i]->race }}</p>
                            </div>
                        </div>
                    </td>
                    @endif
                    @endfor
                    </tr>
            </table>
        </div>
    </div>
    <div class="col-12 d-block d-sm-block d-md-block d-lg-none">
        <div class="col-12">
            <div class="card mt-3 text-center">
                <div class="card-body">
                    <h5 class="card-title">Mascotas</h5>
                </div>
                <table border="1" cellpadding="10" class="text-center">
                    @for ($i = 0; $i < count($pets); $i++) @if($i % 1==0) <tr>
                        <td>
                            <div class="row mt-3">
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="card" style="width: 13rem;">
                                        <img src="https://picsum.photos/{{$i}}00" class="card-img-top" alt="...">
                                        <div class="card-body text-center">
                                            <p class="card-title h6">Nombre: {{ $pets[$i]->name }}</p>
                                            <p class="card-title h6">Color: {{ $pets[$i]->color }}</p>
                                            <p class="card-title h6">Raza:{{ $pets[$i]->race }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @else
                        <td>
                            <div class="card" style="width: 14rem;">
                                <img src="https://picsum.photos/{{$i+2}}00" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <p class="card-title h6">Nombre: {{ $pets[$i]->name }}</p>
                                    <p class="card-title h6">Color: {{ $pets[$i]->color }}</p>
                                    <p class="card-title h6">Raza:{{ $pets[$i]->race }}</p>
                                </div>
                            </div>
                        </td>
                        @endif
                        @endfor
                        </tr>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="bg bg-white m-5">
        <h1>Aún no tienes mascotas registradas</h1>
        <a href="/pets/create" class="ml-3 btn btn-outline-success">Agregar mascota</a>
    </div>
    @endif
</div>
</div>
@endsection