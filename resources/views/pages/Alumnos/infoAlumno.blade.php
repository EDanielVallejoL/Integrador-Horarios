<?php

    $id = $_GET['x'];

    include(app_path() . '/BD/abrir.php');
    $consulta = "SELECT * FROM alumnos WHERE id = '$id'";
        
    $res = mysqli_query($conexion,$consulta);
    echo '<div class="p-1 mb-2 bg-white text-dark"">';

    while($mostrar = mysqli_fetch_array($res)){
        echo '
            <div class="row ">
                <div class="col-3">';
        echo        "<b>Horario de : </b>".$mostrar['alumno'];
        echo    '</div>
                <div class="col-3">';
        echo        "<b>Carrera: </b>".$mostrar['carrera'];
        echo    '</div>
                <div class="col-2">';
        echo        "<b>Clave: </b>".$mostrar['clave'];
        echo    '</div>
                <div class="col-2">';
        echo        "<b>Calificación: </b>".$mostrar['calificacion'];
        echo    '</div>
                 <div class="col-1">';
        echo        "<td><button  type='button' class='btn btn-success' onclick='ocultaEstediv()'>  <i>Ver otro alumno</i> </button></td>";
        echo    '</div>';

        
        $opcion = $mostrar['opcion'];
        $carrera = $mostrar['carrera'];

        $consulta2 = "SELECT * FROM horas_ocios WHERE opcion = '$opcion' AND carrera = '$carrera'";
        
        $res2 = mysqli_query($conexion,$consulta2);
        
        while($mostrar2 = mysqli_fetch_array($res2)){
            echo '<div class="col-3">';
            echo    "<b>Horas de hocio totales: </b>".$mostrar2['hrsOcioTotales'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Lunes: </b>".$mostrar2['Lunes'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Martes: </b>".$mostrar2['Martes'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Miercoles: </b>".$mostrar2['Miercoles'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Jueves: </b>".$mostrar2['Jueves'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Viernes: </b>".$mostrar2['Viernes'];
            echo '</div>';
            echo '<div class="col-1">';
            echo    "<b>Sabado: </b>".$mostrar2['Sabado'];
            echo '</div>';

        }

        echo '</div>
        ';
    }


    $consulta = "SELECT * FROM Horarios WHERE NombreCarrera = '$carrera' AND Opcion = '$opcion'";
        
    $res = mysqli_query($conexion,$consulta);
    echo '<br>';
    echo '<div class="p-1 mb-2 bg-white text-dark"">';
    echo '<table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
            </tr>
        </thead>';

    echo '<tbody class="bg-secondary">';
    while($mostrar = mysqli_fetch_array($res)){
        echo '
        <tr>
            <td>' , $mostrar['Hora'],  '</td>';
            echo '<td>';
                if($mostrar['Lunes'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            echo '<td>';
                if($mostrar['Martes'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            echo '<td>';
                if($mostrar['Miercoles'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            echo '<td>';
                if($mostrar['Jueves'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            echo '<td>';
                if($mostrar['Viernes'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            echo '<td>';
                if($mostrar['Sabado'] == 'si')
                {
                    echo $mostrar['NombreMateria'];
                }
                else
                {
                    echo "----";
                }
            echo '</td>';
            
         echo '</tr>';
         
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    echo '</div>';

   
?>