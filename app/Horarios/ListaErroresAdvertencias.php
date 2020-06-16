<?php
include(app_path() . '/BD/abrir.php');
$aux =1;
foreach ($ReporteErroresAdvertencias as $REA) {
    $queEs = "";
    foreach($REA as $lista)
    {
        if($aux == 1)
        {
            $queEs = "Advertencias";
            $aux = $aux + 1;
        }else{
            $queEs = "Errores";
        }
        foreach($lista as $tex)
        {
            // Inserción 
            $insertar = "INSERT INTO lista_errores_advertencias  VALUES (NULL, '$queEs', '$tex')";
            $query = mysqli_query($conexion, $insertar);       
        }
    }
}
mysqli_close($conexion);
?>