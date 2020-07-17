<?php

    $nombreCarrera = $_GET['x'];
    $opcion = $_GET['y'];

    include(app_path() . '/BD/abrir.php');

    $consulta2 = "SELECT * FROM horas_ocios WHERE opcion = '$opcion' AND carrera = '$nombreCarrera'";
    $res2 = mysqli_query($conexion,$consulta2);
    echo '<div class="p-1 mb-2 bg-white text-dark"">';
    echo '<table class="table table-sm table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Horas de toda la semana</th>
                <th>Horas seguidas</th>
                <th>Horas individuales</th>
                <th>Horas ocio totales</th>
            </tr>
        </thead>';
    echo '<tbody>';
    
    while($mostrar2 = mysqli_fetch_array($res2)){
        $numeros = str_split($mostrar2['hrsOcioTotales']);//Desfragmenta horas ocio
        while(count($numeros) < 3){
            array_unshift($numeros,0);
        };
        echo '
        <tr>
            <td>' , $numeros[0],  '</td>';
            echo '<td>';
            echo $numeros[1];
             echo '</td>';
             echo '<td>';
             echo $numeros[2];
              echo '</td>';
              echo '<td class="bg bg-warning">';
              echo $numeros[0]+$numeros[1]+$numeros[2];
               echo '</td>';
            
        echo '</tr>';
        //echo '<div class="col-3">';
        //echo    "<b>Horas de ocio totales: </b> <p class='text-danger'>".$mostrar2['hrsOcioTotales']."</p>";
        //echo '</div>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>
    ';

    $consulta = "SELECT * FROM Horarios WHERE NombreCarrera = '$nombreCarrera' AND Opcion = '$opcion'";
        
    $res = mysqli_query($conexion,$consulta);
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

?>