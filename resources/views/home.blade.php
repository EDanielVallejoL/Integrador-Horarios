@extends('layouts.app')

@section('content')

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
      <div class="barra">
        <div class="barra_azul" id="barra_estado"></div>
        <span></span>
      </div>
      <li class="list-group-item bg-secondary text-white">
        <p><input type="file" class="form-control-file" id="exampleFormControlFile2" name="file2"></p>
      </li>
      <li class="list-group-item bg-secondary text-white">
        <p><input type="submit" name="upload" value="Upload"></p>
      </li>
    </ul>
  </div>
</form>

@endsection



<?php


# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpParser\Node\Stmt\Else_;

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


  $listaCarreras = array("");
  $bandera = 0;

  foreach ($hojaActual->getRowIterator() as $fila) {
    foreach ($fila->getCellIterator() as $celdaPrueba) {

      # El valor, así como está en el documento
      $valorRaw = $celdaPrueba->getValue();


      # Fila, que comienza en 1, luego 2 y así...
      $fila = $celdaPrueba->getRow();
      # Columna, que es la A, B, C y así...
      $columna = $celdaPrueba->getColumn();

      if ($valorRaw != "") {
        if ($columna == "B" || $columna == "D") {
          if ($columna == "B") {
            if ($valorRaw != "carrera") {
              array_push($listaCarreras, $valorRaw);
            }
          }
        }
      }
    }
  }

  echo '<div class="btn-group">
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Carreras
</button>
<div class="dropdown-menu">';
  $i = 0;
  foreach (array_unique($listaCarreras) as $c) {
    echo '<a class="dropdown-item" id="carrera' . $i . '"  href="#">';
    print_r($c);
    echo '</a>';
    $i += 1;
  }
  echo '</div>
</div>';

  #Si cumple con que es el archivo buscado entonces realiza el mostrar
  if ($celda == "cve_carrera") {
    /*
    for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
      # Obtener hoja en el índice que vaya del ciclo
      $hojaActual = $documento->getSheet($indiceHoja);

      # Iterar filas
      echo '<table class="table">';
      $i = 0;
      foreach ($hojaActual->getRowIterator() as $fila) {
        if ($i == 0) {
          echo '<thead class="thead-dark">';
          echo '<tr>';
          foreach ($fila->getCellIterator() as $celda) {
            # Si es una fórmula y necesitamos su valor, llamamos a:
            $valorCalculado = $celda->getCalculatedValue();
            echo "<th>$valorCalculado</th>";
          }
          echo '<tr>';
          echo '</thead>';
          $i = 1;
        } else {
          echo '<tbody>';
          echo '<tr class="p-3 mb-2 bg-light text-dark">';
          foreach ($fila->getCellIterator() as $celda) {
            # Si es una fórmula y necesitamos su valor, llamamos a:
            $valorCalculado = $celda->getCalculatedValue();
            echo "<td>$valorCalculado</td>";
          }
          echo '<tr>';
          echo '</tbody>';
        }
      }
      echo '</table>';
    }*/
  } else {
    echo  '<div class="alert alert-warning" role="alert">
      El documento cargado no es el correcto.Cargar el archivo correspondiente.
    </div>';
  }
}


?>