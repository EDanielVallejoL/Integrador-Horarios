@extends('layouts.app')

@section('content2')
<?php

include(app_path() . '/BD/abrir.php');
$consulta = "SELECT * FROM lista_errores_advertencias WHERE mensaje != ' '";

$res = mysqli_query($conexion, $consulta);
echo '<div class="card alert alert-success text-black " style="width: 47rem;">';
echo '<table id="example3" class="table table-striped table-bordered " style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Tipo</th>
                <th>Mensaje</th>
            </tr>
        </thead>';

echo '<tbody>';
while ($mostrar = mysqli_fetch_array($res)) {
    echo '<tr>
            <td>', $mostrar['tipo'],  '</td>    
            <td>', $mostrar['mensaje'],  '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
?>
@endsection

@section('content3')

<script>
    alertify.error("Se encontraron los conflictos descritos en las tablas, corrige para continuar porfavor");
</script>

@endsection