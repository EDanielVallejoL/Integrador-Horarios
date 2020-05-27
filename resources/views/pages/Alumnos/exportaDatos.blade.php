@extends('layouts.app')

@section('content5')

<div id="loader" class="loader"></div>


<div class="card alert alert-success text-black " style="width: 90rem;">
    <table id="example2" class="table table-striped table-bordered " style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
                <th>Clave</th>
                <th>Alumno</th>
                <th>Carrera</th>
                <th>Matera</th>
                <th>Profesor</th>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
            </tr>
        </thead>
        <tbody id='datos' class="bg-white">
        <?php
            include(app_path() . '/BD/abrir.php');
            $consulta = "SELECT * FROM alumnos a INNER JOIN horarios b ON a.opcion = b.Opcion AND  a.carrera = b.NombreCarrera";
            $res = mysqli_query($conexion,$consulta);

            while($mostrar = mysqli_fetch_array($res)){
                echo '<tr>'; 
                    echo '<td>' , $mostrar['clave'],  '</td>';   
                    echo '<td>' , $mostrar['alumno'],  '</td>';   
                    echo '<td>' , $mostrar['carrera'],  '</td>';   
                    echo '<td>' , $mostrar['NombreMateria'],  '</td>';          
                    echo '<td>' , $mostrar['Profesor'],  '</td>'; 
                    echo '<td>' , $mostrar['Hora'],  '</td>';
                    echo '<td>' , $mostrar['Lunes'],  '</td>';
                    echo '<td>' , $mostrar['Martes'],  '</td>';     
                    echo '<td>' , $mostrar['Miercoles'],  '</td>';
                    echo '<td>' , $mostrar['Jueves'],  '</td>';
                    echo '<td>' , $mostrar['Viernes'],  '</td>';
                    echo '<td>' , $mostrar['Sabado'],  '</td>';
                echo '</tr>';                   
               }
        ?>

        </tbody>
    </table>

</div>
<script> alertify.warning('Selecciona el formato para descargar en automático'); </script>

@endsection