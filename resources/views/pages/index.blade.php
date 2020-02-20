<!--PAGINA INICIO IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!-->
@extends('layouts.base')

@section('title', 'Publicaciones')

@section('content')
<h1>Cargar Excel .xlsx</h1>

@endsection 

<?php
/**
 * Demostrar lectura de hoja de cálculo o archivo
 * de Excel con PHPSpreadSheet: leer determinada fila
 * y columna por coordenadas
 *
 * @author parzibyte
 */


# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;

# Recomiendo poner la ruta absoluta si no está junto al script
# Nota: no necesariamente tiene que tener la extensión XLSX
$rutaArchivo = "..\MateriasSA.xlsx";
$documento = IOFactory::load($rutaArchivo);

# Recuerda que un documento puede tener múltiples hojas
# obtener conteo e iterar
$totalDeHojas = $documento->getSheetCount();

# Iterar hoja por hoja
for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {

    # Obtener hoja en el índice que vaya del ciclo
    $hojaActual = $documento->getSheet($indiceHoja);
    echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";

    $coordenadas = "B1";

    # Lo que hay en A1
    $celda = $hojaActual->getCell($coordenadas);
    # El valor, así como está en el documento
    $valorRaw = $celda->getValue();

    # Formateado por ejemplo como dinero o con decimales
    $valorFormateado = $celda->getFormattedValue();

    # Si es una fórmula y necesitamos su valor, llamamos a:
    $valorCalculado = $celda->getCalculatedValue();

    # Imprimir
    echo "En <strong>$coordenadas</strong> tenemos el valor <strong>$valorRaw</strong>. ";
    echo "Formateado es: <strong>$valorFormateado</strong>. ";
    echo "Calculado es: <strong>$valorCalculado</strong><br><br>";

}

?>