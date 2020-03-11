<form action="?" method="POST" enctype="multipart/form-data">
  @csrf
  @method('GET')
  <div class="card bg-success text-white" style="width: 25rem;">
    <div class="card-header">
      Archivos necesarios
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item bg-secondary text-white">
        <p><input type="file" class="form-control-file" id="exampleFormControlFile1" name="file"></p>
      </li>
      <li class="list-group-item bg-secondary text-white">
        <p><input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2"></p>
      </li>
      <li class="list-group-item bg-secondary text-white">
        <p><input type="submit" name="upload" value="Upload"></p>
      </li>
    </ul>
  </div>
</form>




<?php





$Carreras=array('INGENIERÍA AGROINDUSTRIAL'=>array(),
                      'INGENIERÍA AMBIENTAL'=>array(),
                      'INGENIERÍA CIVIL'=>array(),
                      'INGENIERÍA EN COMPUTACIÓN'=>array(),
                      'INGENIERÍA EN ELECTRICIDAD Y AUTOMATIZACIÓN'=>array(),
                      'INGENIERÍA EN GEOINFORMÁTICA'=>array(),
                      'INGENIERÍA EN GEOLOGÍA'=>array(),
                      'INGENIERÍA EN MECATRÓNICA'=>array(),
                      'INGENIERÍA EN SISTEMAS INTELIGENTES'=>array(),
                      'INGENIERÍA EN TOPOGRAFÍA Y CONSTRUCCIÓN'=>array(),
                      'INGENIERÍA MECÁNICA'=>array(),
                      'INGENIERÍA MECÁNICA ADMINISTRATIVA'=>array(),
                      'INGENIERÍA MECÁNICA ELÉCTRICA'=>array(),
                      'INGENIERÍA METALÚRGICA Y DE MATERIALES'=>array());


use Illuminate\Validation\Rules\Unique;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpParser\Node\Stmt\Else_;
use Symfony\Component\VarDumper\VarDumper;


# Recomiendo poner la ruta absoluta si no está junto al script
# Nota: no necesariamente tiene que tener la extensión XLSX

if (isset($_POST['upload'])) {
  $file = $_FILES['file']['tmp_name'];
  $rutaArchivo = $file;
  $documento = IOFactory::load($rutaArchivo);
  $totalDeHojas = $documento->getSheetCount();

  # obtenemos la primera celda para la validacion del archivo CPM
  $coordenadas = "A1";
  $hojaActual = $documento->getSheet(0);
  $celda = $hojaActual->getCell($coordenadas);
  $valorRaw = $celda->getValue();


  $listaCarreras = array(array(""));
  $bandera = 0;
  $contadorCarreras = "1";

  foreach ($hojaActual->getRowIterator() as $fila) {
    foreach ($fila->getCellIterator() as $celdaPrueba) {

      # El valor, así como está en el documento
      $valorRaw = $celdaPrueba->getValue();


      # Fila, que comienza en 1, luego 2 y así...
      $fila = $celdaPrueba->getRow();
      # Columna, que es la A, B, C y así...
      $columna = $celdaPrueba->getColumn();

      if ($valorRaw != "" || $valorRaw != 'carrera' || $valorRaw != 'materia') {
        if ($columna == "B" || $columna == "D") {
          if ($columna == "B") {
            $celda = $hojaActual->getCell($columna.$contadorCarreras);
            $numeroTemporal = intval($contadorCarreras) + 1;
            $contadorCarreras = strval($numeroTemporal);
            $chido = $valorRaw;
            if($chido != 'carrera')
            {
              
            }
          }else{
            $materia = $valorRaw;
            if($materia != 'materia')
            {
              $f = "'".$materia."'";
              array_push($Carreras[$chido],$f);
            }
          }
        }
      }
    }
  }

  foreach($Carreras as $carrera => $informacion)
{
  echo'<h3>'.$carrera.'</h3>'; 
  echo '<br>';
  foreach($informacion as $in)
  {
    echo $in;
    echo '<br>';
  }
}


}




?>