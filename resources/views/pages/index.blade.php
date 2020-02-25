<!--PAGINA INICIO IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilosManuales.css">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand navbar-light bg-danger">
    <a class="navbar-brand" href="#">Cargar Archivos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Perfil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opcion2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opcion3</a>
        </li>
      </ul>
      <span class="navbar-text">

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>



      </span>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript">
  // Daniel esto le sigues jS 
    $(document).ready(function() {
      $("a").click(function() {
        var algo = $(this).attr("id");
        alert($('#' + algo).text());
      });
    });
  </script>
</body>

</html>

<form action="?" method="POST" enctype="multipart/form-data">
  @csrf
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
          /*echo "En <strong>$columna$fila</strong> tenemos el valor <strong>$valorRaw</strong>. "; 
              echo '<br>';*/
          #Aqui metemos las materias en una lista
          #valorRaw nos da lo que tenemos en las celdas
          if ($columna == "B") {
            if ($valorRaw != "carrera") {
              array_push($listaCarreras, $valorRaw);
            }
          }
        }
      }
    }
  }
  /*print_r(array_unique($listaCarreras));*/

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
    /*for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
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