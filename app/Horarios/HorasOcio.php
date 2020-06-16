<?php
include(app_path() . '/BD/abrir.php');

foreach($listaOcio as $h)
{
    $numHorario = $h->numHorario;
    $carrera = $h->carrera;
    $ocioTotal = $h->ocioTotal;

    $L = $h->listOscio[0]['ocio'];
    $M = $h->listOscio[1]['ocio'];
    $Mi = $h->listOscio[2]['ocio'];
    $J = $h->listOscio[3]['ocio'];
    $V = $h->listOscio[4]['ocio'];
    $S = $h->listOscio[5]['ocio'];

    // Inserción 
    $insertar = "INSERT INTO horas_ocios  VALUES (NULL, '$numHorario', '$carrera', '$ocioTotal', '$L', ' $M', '$Mi', '$J', '$V', '$S')";
    $query = mysqli_query($conexion, $insertar);       
}
mysqli_close($conexion);
?>