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


# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpParser\Node\Stmt\Else_;

$contador = 0;

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

  //temporales
  $cve_carrera = "";
  $carrera="";
  $cve_materia ="";
  $materia = "";
  $nivel = "";
  $columna = "";

  foreach ($hojaActual->getRowIterator() as $fila) {
    foreach ($fila->getCellIterator() as $celdaPrueba) {

      # El valor, así como está en el documento
      $valorRaw = $celdaPrueba->getValue();


      # Fila, que comienza en 1, luego 2 y así...
      $fila = $celdaPrueba->getRow();
      # Columna, que es la A, B, C y así...
      $columna = $celdaPrueba->getColumn();

                if($columna == 'A')
                {
                    //cve_carrera
                    $cve_carrera = $valorRaw;
                }else{
                    if($columna == 'B')
                    {
                        //carrera
                        $carrera = $valorRaw;
                    }else{
                        if($columna == 'C')
                        {
                            //cve_materia
                            $cve_materia = $valorRaw;
                        }else{
                            if($columna == 'D')
                            {
                                //materia
                                $materia = $valorRaw;
                            }else{
                                if($columna == 'E')
                                {
                                    //nivel
                                    $nivel = $valorRaw;
                                }else{
                                    if($columna == 'F')
                                    {
                                        //columna
                                        $columna = $valorRaw;
                                        $lista = array($cve_carrera,$carrera,$cve_materia,$materia,$nivel,$columna);
                                        var_dump($lista);
                                        echo'<br>';
                                    }
                                }
                            }
                        }
                    }
                }

            }
           
        }

        

    }



echo '<form action="" method="post" ></form>';

?>