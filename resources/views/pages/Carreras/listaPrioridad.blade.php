@extends('layouts.app')

@section('content2')
<?php

include(app_path() . '/BD/abrir.php');
$consulta = "SELECT * FROM lista_prioridad ";

$res = mysqli_query($conexion, $consulta);
echo '<div class="card alert alert-success text-black " style="width: 47rem;">';
echo '<table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Promedio</th>
                <th>Carrera</th>
            </tr>
        </thead>';

echo '<tbody>';
while ($mostrar = mysqli_fetch_array($res)) {
    echo '<tr>
            <td>', $mostrar['promedio'],  '</td>    
            <td>', $mostrar['carrera'],  '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
?>
@endsection

@section('content3')

<div class="p-5">
    <div class="p-3 mb-2 card bg-info" style="width: 15rem;">
        <h3 class="text-white">Obtención de orden</h3>
        <p><b><i>Esta lista se genera a partir de que si la matería tiene muchos grupos va a ser de las ultimas
                    en generar sus horarios
                    <i></b></p>

    </div>
</div>

<script>
    alertify.success("Puedes ver los horarios bloques que se generaron si ya revisaste esta información");
    alertify.success("Puedes ya ir a ver los alumnos directamente si es el caso o exportar a excel los datos");
</script>

@endsection