<?php


include(app_path() . '/BD/abrir.php');


foreach ($listaAlumnosInscritos as $lista) {
    $c1 = $lista->ClaveAlumno;
    $c2 = $lista->NombreAlumno;
    $c3 = $lista->CalificacionAlumno;
    $c4 = $lista->CarreraAlumno;
    $c5 = $lista->NumeroHorarioAsignado;



        // Inserción 
        $insertar = "INSERT INTO alumnos  VALUES (NULL, '$c1', '$c2', '$c3', '$c4', '$c5')";

        $query = mysqli_query($conexion, $insertar);
}




mysqli_close($conexion);


?>