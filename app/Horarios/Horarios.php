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



foreach ($listaHorariosFinal2 as $final) {
 
   $c2 = $final->numeroHorario;
   foreach($final->listaDia as $horario)
   {
      

         $c1 = $horario->carr;
         $ClMa = $horario->ClaveMateria; // Quimica
         $c3 = $horario->campo; // Quimica
         $c4 = $horario->hora; //08-09  
         $c5 = $horario->profesor;

         $Lunes = "no";
         $Martes = "no";
         $Miercoles = "no";
         $Jueves = "no";
         $Viernes = "no";
         $Sabado = "no";
         


         $mystring = $horario->dias;


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
        $insertar = "INSERT INTO horarios  VALUES (NULL, '$c1', '$c2', '$ClMa', '$c3', '$c5', '$c4', '$Lunes', '$Martes', '$Miercoles', '$Jueves', '$Viernes', '$Sabado')";

        $query = mysqli_query($conexion, $insertar);
   }
}




mysqli_close($conexion);


?>