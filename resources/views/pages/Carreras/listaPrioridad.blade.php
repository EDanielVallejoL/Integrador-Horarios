@extends('layouts.app')

@section('content2')
<?php

include(app_path() . '/BD/abrir.php');
$consulta = "SELECT * FROM lista_prioridad ";

$res = mysqli_query($conexion, $consulta);
echo '<div class="card alert alert-success text-black " style="width: 47rem;">';


echo '

<div class="row bg-dark text-white">
    <div class="Carrera col-2 border">
        <p class="dato">Lugar</p>
    </div>
    <div class="Promedio col-3 border">
        <p class="label">Promedio</p>
    </div>
    <div class="Carrera col-6 border">
        <p class="dato">Carrera</p>
    </div>
</div>


<div class="row">

    <div class="Carrera col-2 border bg-white">';


    for ($i = 1; $i <= 14; $i++) {
        echo '<p class="dato col-sm border">',$i,'°</p>';
    }

    echo'
    </div>
    

<div class="lista col-9" id="lista">';

$i=1;
while ($mostrar = mysqli_fetch_array($res)) {

    echo'
    <div class="renglon row" data-id="',$mostrar['id'],'">
        <div class="Promedio col-4 border">
            <p class="label">', $mostrar['promedio'],  '</p>
        </div>
        <div class="Carrera col-8 border" id="carrera',$i,'">
            <p class="dato">', $mostrar['carrera'],  '</p>
        </div>
    </div>
    ';
    $i++;
}
echo '
</div>
</div>
';

echo '</div>';
?>
@endsection

@section('content3')

<div class="p-5">
    <div class="p-3 mb-2 card bg-info" style="width: 15rem;">
        <h3 class="text-white">Obtención de orden</h3>
        <p><b><i>Esta lista se genera a partir de que si la matería tiene muchos grupos va a ser de las ultimas
                    en generar sus horarios, pero este resultado es libre de mover si así se desea.
                    <i></b></p>

    </div>

    <div class="p-3 mb-2" style="width: 15rem;">
        <button class="btn-success" id="nextStep">Siguiente paso</button>
    </div>
</div>

@endsection