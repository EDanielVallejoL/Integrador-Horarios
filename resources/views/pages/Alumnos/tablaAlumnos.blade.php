@extends('layouts.app')

@section('content2')

<div class="card alert alert-success text-black " style="width: 60rem;">
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
                <th>Clave</th>
                <th>Alumno</th>
                <th>Calificación</th>
                <th>Carrera</th>
                <th>Opción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id='datos' class="bg-white">
        <?php
            include(app_path() . '/BD/abrir.php');
            $consulta = "SELECT * FROM alumnos";
            $res = mysqli_query($conexion,$consulta);

            while($mostrar = mysqli_fetch_array($res)){
                echo '<tr>'; 
                    echo '<td>' , $mostrar['clave'],  '</td>';   
                    echo '<td>' , $mostrar['alumno'],  '</td>';   
                    echo '<td>' , $mostrar['calificacion'],  '</td>';   
                    echo '<td>' , $mostrar['carrera'],  '</td>';          
                    echo '<td>' , $mostrar['opcion'],  '</td>';   
                    echo "<td><button id = 'idA_".$mostrar['id']."' type='button' class='btn btn-info' onclick='muestraDiv()'>  <i>Ver horario</i> </button></td>";
                echo '</tr>';                   
               }
        ?>

        </tbody>
    </table>

</div>

@endsection