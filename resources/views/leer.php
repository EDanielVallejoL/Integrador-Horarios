<!--PAGINA INICIO IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!-->
@extends('layouts.base')

@section('title', 'Publicaciones')

@section('content')
<h1>Cargar Excel .xlsx</h1>

<form action= "?" method = "POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group p-3 mb-2 bg-success text-white" >
    <p><input type="file" class="form-control-file" id="exampleFormControlFile1" name="file"></p>
    <p><input type="submit" name="upload" value="Upload"></p>
  </div>
</form>

@endsection 


<?php

        /**
     * Demostrar lectura de hoja de cálculo o archivo
     * de Excel con PHPSpreadSheet: leer todo el contenido
     * de un archivo de Excel
     *
     * @author parzibyte
     */


    # Indicar que usaremos el IOFactory
    use PhpOffice\PhpSpreadsheet\IOFactory;

    require '../Clases/PHPExcel/IOFactory.php';
    require 'conexion.php';

    if(isset($_POST['upload'])) {
        $file = $_FILES['file']['tmp_name'];
        $rutaArchivo = $file;

        $objPHPExcel = PHPEXCEL_IOFactory::load($rutaArchivo);

        $objPHPExcel->setActiveSheetIndex(0);

        $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

        echo '<table border=1><tr><td>cve_carrera</td><td>carrera</td><td>cve_materia</td><td>materia</td></tr>';

        for($i = 1; $i <= $numRows; $i++)
        {
            $cveCarrera = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $Carrera = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $cveMateria = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $Materia = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();

            echo '<tr>';
            echo '<td>'.$cveCarrera.'</td>';
            echo '<td>'.$Carrera.'</td>';
            echo '<td>'.$cveMateria.'</td>';
            echo '<td>'.$Materia.'</td>';
            echo '</tr>';
        }
        echo '</table>';


       
    }
    

?>