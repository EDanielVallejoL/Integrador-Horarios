@extends('layouts.app')

@section('content')

<div class="card alert alert-success text-black " style="width: 27rem;">
    <h1>Alumnos</h1>

    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
                <th>id</th>
                <th>clave</th>
                <th>alumno</th>
                <th>calificación</th>
                <th>Carrera</th>
                <th>opcion</th>
            </tr>
        </thead>
        <tbody id='datos' class="bg-white">
        <?php
            include(app_path() . '/BD/abrir.php');
            $consulta = "SELECT * FROM alumnos";
            $res = mysqli_query($conexion,$consulta);

            while($mostrar = mysqli_fetch_array($res)){
                echo '<tr>';  
                    echo '<td>' , $mostrar['id'],  '</td>';     
                    echo '<td>' , $mostrar['clave'],  '</td>';   
                    echo '<td>' , $mostrar['alumno'],  '</td>';   
                    echo '<td>' , $mostrar['calificacion'],  '</td>';   
                    echo '<td>' , $mostrar['carrera'],  '</td>';          
                    echo '<td>' , $mostrar['opcion'],  '</td>';   
                echo '</tr>';                   
               }
        ?>

        </tbody>
    </table>

</div>

@endsection