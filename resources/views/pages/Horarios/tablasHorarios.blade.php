<?php

    $nombreCarrera = $_GET['x'];
    $opcion = $_GET['y'];

    include(app_path() . '/BD/abrir.php');
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