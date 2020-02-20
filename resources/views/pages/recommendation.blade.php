@extends('layouts.base')

@section('title', 'Recomendaciones')

@section('content')

<!-- Publicaciones -->
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="https://picsum.photos/400?random=1" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Parque de morales</h5>
                <p class="card-text">Es un parque muy bonito, van muchas mascotas y tu mascota puede conocer a muchas mas.</p>
                <p class="card-text"><small class="text-muted">Ubicado en carranza #19928 Colonia glorieta</small></p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="https://picsum.photos/400?random=2" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Parque industrial</h5>
                <p class="card-text">No es un parque muy bonito pero a tu mascota no le importaría estar ahi.</p>
                <p class="card-text"><small class="text-muted">Por la carretera</small></p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="https://picsum.photos/400?random=3" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Parque tangamanga</h5>
                <p class="card-text">Es un parque muy grande, van muchas mascotas y tu mascota puede conocer a muchas mas.</p>
                <p class="card-text"><small class="text-muted">Ubicado por el cobach y plaza tangamanga</small></p>
            </div>
        </div>
    </div>
</div>
@endsection
