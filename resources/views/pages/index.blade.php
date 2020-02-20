<!--PAGINA INICIO IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!-->
@extends('layouts.base')

@section('title', 'Publicaciones')

@section('content')
<h1>Cargar Excel .xlsx</h1>

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

# Recomiendo poner la ruta absoluta si no está junto al script
# Nota: no necesariamente tiene que tener la extensión XLSX
$rutaArchivo = "../Materia1.xlsx";
$documento = IOFactory::load($rutaArchivo);

# Recuerda que un documento puede tener múltiples hojas
# obtener conteo e iterar
$totalDeHojas = $documento->getSheetCount();

# Iterar hoja por hoja
for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
    # Obtener hoja en el índice que vaya del ciclo
    $hojaActual = $documento->getSheet($indiceHoja);

    # Iterar filas
    echo '<table class="table">'; 
    $i = 0;
    foreach ($hojaActual->getRowIterator() as $fila) {
        if ($i == 0)
        {
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
        }
        else
        {
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
}

?>