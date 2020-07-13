<?php


include(app_path() . '/BD/abrir.php');

$consulta = "SELECT * FROM horarios ";
        
$res = mysqli_query($conexion,$consulta);

if($res->num_rows > 0)
{

   mysqli_query($conexion, "TRUNCATE TABLE horarios");
   mysqli_query($conexion, "TRUNCATE TABLE lista_prioridad");
   mysqli_query($conexion, "TRUNCATE TABLE alumnos");
   mysqli_query($conexion, "TRUNCATE TABLE lista_errores_advertencias");
   mysqli_query($conexion, "TRUNCATE TABLE horas_ocios");
}



foreach ($listaHorariosFinal as $lista) {
  
   if($lista->listaDia != null)//Si el arreglo no esta vacio
   {
    $c1 = $lista->listaDia[0]->carr;
    $c2 = $lista->numeroHorario;


    for ($i = 0; $i < count($lista->listaDia); $i++) {

        $c3 = $lista->listaDia[$i]->campo;
        $c4 = $lista->listaDia[$i]->hora;
        $c5 = $lista->listaDia[$i]->profesor;
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
        $insertar = "INSERT INTO horarios  VALUES (NULL, '$c1', '$c2', '$c3', '$c5', '$c4', '$Lunes', '$Martes', '$Miercoles', '$Jueves', '$Viernes', '$Sabado')";

        $query = mysqli_query($conexion, $insertar);
    }
   }
}




mysqli_close($conexion);


?>