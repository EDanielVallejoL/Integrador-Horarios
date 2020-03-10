@extends('layouts.app')

@section('content')

<?php 

// multidimensional array 
//Array total de un horario
$marks = array( 
	
	// Encabezado Hora 
	"Hora" => array( 
		

		// Key =>  Valor entero
		"7" => 7, 
		"8" => 8, 
        "9" => 9, 
        "10" => 10, 
        "11" => 11, 
        "12" => 12, 
        "13" => 13, 
        "14" => 14, 
        "15" => 15, 
        "15" => 16, 
        "17" => 17, 
        "18" => 18, 
        "19" => 19, 
        "20" => 20, 
        "21" => 21, 
	), 
		
	// Arreglo de materias por hora del Lunes
	"Lunes" => array( 
		
		// Key =>  Nombre de la materia
		"7" => "Libre", 
		"8" => "Quimica A", 
		"9" => "Libre", 
	), 
	
	// Arreglo de materias por hora del Martes
	"Martes" => array( 
		
		// Key =>  Nombre de la materia
		"7" => "Libre", 
		"8" => "Libre", 
		"9" => "Libre", 
	), 
  	// Arreglo de materias por hora del Miercoles
	"Miercoles" => array( 
		
		// Key =>  Nombre de la materia
		"7" => "Libre", 
		"8" => "Quimica A", 
		"9" => "Libre", 
	), 
); 

// Acceso a los elementos del array 
	
// Muestra el valor de El arreglo Hora y la Key 8 el cual es 8
echo $marks['Hora']['8'] . "\n"; 
	
// Acceso al array usando un ciclo Muestra el contenido de todos los array y de cada una de las horas
foreach($marks as $mark) { 
    //foreach($mark['7'] as $m)
    //{
      //  echo $m . "\n";
    //}
	echo $mark['7']. " ".$mark['8']." ".$mark['9']."\n"; 
} 
	
?> 
<div class="container">
<h1>Horario</h1>
<table class="table table-light" >
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
    </thead>

    <tr>
    <?php
        foreach($marks as $mark)
        {
    ?>  
        <td><?php echo $mark['7'] ?></td>
    <?php
        }
    ?>
    </tr>
    <?php
        foreach($marks as $mark)
        {
    ?>  
        <td><?php echo $mark['8'] ?></td>
    <?php
        }
    ?>
    </tr>
    <?php
        foreach($marks as $mark)
        {
    ?>  
        <td><?php echo $mark['9'] ?></td>
    <?php
        }
    ?>
    </tr>

    <tr>
        <td>
            <?php
                echo $marks['Hora']['7'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Lunes']['7'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Martes']['7'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Miercoles']['7'] . "\n"
            ?>
        </td>

    </tr>
    <tr>
        <td>
            <?php
                echo $marks['Hora']['8'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Lunes']['8'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Martes']['8'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Miercoles']['8'] . "\n"
            ?>
        </td>

    </tr>
    <tr>
        <td>
            <?php
                echo $marks['Hora']['9'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Lunes']['9'] . "\n"
            ?>
        </td>
        <td>
        <?php
                echo $marks['Martes']['9'] . "\n"
            ?>
        </td>
        <td>
        <?php
                $marks = array("Miercoles"=> array( "9" => "LabQuimica" ));
                echo $marks['Miercoles']['9'] . "\n"
            ?>
        </td>

    </tr>
</table>

</div>


@endsection


