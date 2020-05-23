<?php


include(app_path() . '/BD/abrir.php');


foreach ($listaHorariosFinal as $lista) {
    $c1 = $lista->listaDia[0]->carr;
    $c2 = $lista->numeroHorario;


    for ($i = 0; $i < count($lista->listaDia); $i++) {

        $c3 = $lista->listaDia[$i]->campo;
        $c4 = $lista->listaDia[$i]->hora;
        $Lunes = "no";
        $Martes = "no";
        $Miercoles = "no";
        $Jueves = "no";
        $Viernes = "no";
        $Sabado = "no";
        
        $mystring = $lista->listaDia[$i]->dias;

        $pos = strpos($mystring, "L");
        if ($pos !== false) {
           $Lunes = "si";
        }
        $pos = strpos($mystring, "Ma");
        if ($pos !== false) {
           $Martes = "si";
        }
        $pos = strpos($mystring, "Mi");
        if ($pos !== false) {
           $Miercoles = "si";
        }
        $pos = strpos($mystring, "J");
        if ($pos !== false) {
           $Jueves = "si";
        }
        $pos = strpos($mystring, "V");
        if ($pos !== false) {
           $Viernes = "si";
        }
        $pos = strpos($mystring, "S");
        if ($pos !== false) {
           $Sabado = "si";
        }

        // Inserción 
        $insertar = "INSERT INTO horarios  VALUES (NULL, '$c1', '$c2', '$c3', '$c4', '$Lunes', '$Martes', '$Miercoles', '$Jueves', '$Viernes', '$Sabado')";

        $query = mysqli_query($conexion, $insertar);
    }
}




mysqli_close($conexion);

if ($query) {
    echo '
        <script type="text/javascript">
            alertify.success("Alta completa");
        </script>';
} else {
    echo '
        <script type="text/javascript">
            alertify.error("No se subieron datos");
        </script>';
}

/*
foreach ($listaChida as $lista) {
    echo '<h4>' . $lista->numeroHorario . ' ' . $lista->listaDia[0]->carr . '</h4>';
    echo '<br>';

    echo '<table class="table table-light" >
            <thead class="thead-light">
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

    for ($i = 0; $i < count($lista->listaDia); $i++) {

        echo '
                <tr>
                    <td>', $lista->listaDia[$i]->hora,  '</td>

                    <td>';
        if (substr($lista->listaDia[$i]->dias, 0, 1) == 'L') {
            echo $lista->listaDia[$i]->campo;
        } else {
            echo "----";
        }

        echo '</td>
                    <td>';
        if (substr($lista->listaDia[$i]->dias, 1, 2) == 'Ma') {
            echo $lista->listaDia[$i]->campo;
        } else {
            if (substr($lista->listaDia[$i]->dias, 0, 2) == 'Ma') {
                echo $lista->listaDia[$i]->campo;
            } else {
                echo '----';
            }
        }
        echo '</td>
                    <td>';
        if (substr($lista->listaDia[$i]->dias, 3, 2) == 'Mi') {
            echo $lista->listaDia[$i]->campo;
        } else {
            if (substr($lista->listaDia[$i]->dias, 0, 2) == 'Ma') {
                echo $lista->listaDia[$i]->campo;
            } else {
                echo '---';
            }
        }

        echo '</td>
                    <td>';
        if (substr($lista->listaDia[$i]->dias, 5, 1) == 'J') {
            echo $lista->listaDia[$i]->campo;
        } else {
            if (substr($lista->listaDia[$i]->dias, 0, 2) == 'Ma') {
                echo $lista->listaDia[$i]->campo;
            } else {
                echo '---';
            }
        }

        echo '</td>
                    <td>';
        if (substr($lista->listaDia[$i]->dias, 6, 1) == 'V') {
            echo $lista->listaDia[$i]->campo;
        } else {
            if (substr($lista->listaDia[$i]->dias, 0, 2) == 'Ma') {
                echo $lista->listaDia[$i]->campo;
            } else {
                echo '---';
            }
        }

        echo '</td>
                    <td>';
        if (substr($lista->listaDia[$i]->dias, 7, 1) == 'S') {
            echo $lista->listaDia[$i]->campo;
        } else {
            echo '---';
        }


        echo    '</td>
                </tr>
            ';


        //echo '<h5>' . $lista->listaDia[$i]->campo . ' a la hora: ' . $lista->listaDia[$i]->hora . ' los dias: ' . $lista->listaDia[$i]->dias.'</h5>';
        //echo '<br>';

    }
    // FIN TABLA
    echo '</table>';
}*/

?>