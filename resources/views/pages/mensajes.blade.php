@extends('layouts.base2')

@section('title', 'Pagina principal')

@section('content')


<div class="row justify-content-center">
    <div class="col-sm-12 mb-3 col-md-4 border-right" id="messagesFast">
        <!-- Carga de los diferentes usuarios -->
    </div>
    <div class="col-sm-12 col-md-8 ">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-12 col-md-2">
                <img src="img/mascota2.jpg" alt="Petito" class="rounded-circle w-75">
            </div>
            <div class="col-sm-12 col-md-10">
                <h5>Usuario2</h5>
            </div>
        </div>
        <div id="messagesUserx" class="mt-2 bg bg-white">
            <!-- Historial de conversación -->
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-image"></i></div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Escribe mensaje">
        </div>


    </div>
</div>


@endsection
