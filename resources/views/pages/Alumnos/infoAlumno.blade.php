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
        echo        "<b>Calificación alumno: </b>".$mostrar['calificacion'];
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
            echo    "<b>Horas de ocio totales: </b> <p class='text-danger'>".$mostrar2['hrsOcioTotales']."</p>";
            echo '</div>';
        }

        echo '</div>
        ';
    }


    $consulta = "SELECT * FROM Horarios WHERE NombreCarrera = '$carrera' AND Opcion = '$opcion'";
        
    $res = mysqli_query($conexion,$consulta);
    echo '<br>';
    echo '<div class="p-1 mb-2 bg-white text-dark"">';
    echo '<table class="table table-sm table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>';

    echo '<tbody>';
    while($mostrar = mysqli_fetch_array($res)){
        echo '
        <tr>
            <td>' , $mostrar['Hora'],  '</td>';
                if($mostrar['Lunes'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td class="bg bg-warning">';
                        echo "----";
                    echo '</td>';
                }
                if($mostrar['Martes'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td class="bg bg-warning">';
                        echo "----";
                    echo '</td>';
                }
                if($mostrar['Miercoles'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td class="bg bg-warning">';
                        echo "----";
                    echo '</td>';
                }
                if($mostrar['Jueves'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td class="bg bg-warning">';
                        echo "----";
                    echo '</td>';
                }
                if($mostrar['Viernes'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td class="bg bg-warning">';
                        echo "----";
                    echo '</td>';
                }
                if($mostrar['Sabado'] == 'si')
                {
                    echo '<td>';
                        echo $mostrar['NombreMateria'];
                    echo '</td>';
                }
                else
                {
                    echo '<td>';
                        echo "----";
                    echo '</td>';
                }
            
         echo '</tr>';
         
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    echo '</div>';

   
?>