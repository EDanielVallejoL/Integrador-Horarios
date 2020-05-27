<?php
include(app_path() . '/BD/abrir.php');
foreach ($listaPrioridad as $lista) {
    $c1 = $lista->Promedio;
    $c2 = $lista->Carrera;

    // Inserción 
        $insertar = "INSERT INTO lista_prioridad  VALUES (NULL, '$c1', '$c2')";

        $query = mysqli_query($conexion, $insertar);
}

mysqli_close($conexion);
?>