<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;




//CLASES

class Materias
{
    public $Materia;
    public $valorGrupo;
    public $valorMateria;


    public function __construct($Materia,$valorGrupo,$valorMateria)
    {
        $this->Materia = $Materia;
        $this->valorGrupo = $valorGrupo;
        $this->valorMateria = $valorMateria;
        
    }  
}

class Hora1
{
    public $hora;//08-09  
    public $campo;// Quimica

    public function __construct($hora, array $campo)
    {
        $this->hora = $hora;
        $this->campo = $campo;
    }
}

class Dia1
{
    public $dia;//lunes
    public $horas = array();

    public function __construct($dia, array $listaHoras = [])
    {
        $this->dia = $dia;
        $this->listaHoras = $listaHoras;
    }
}

class Horari1
{

    public $nomcarrera;//compu
    public $listadias = array();//Lunes Martes Mircoles

    public function __construct($nomcarrera, array $listadias = [])
    {
        $this->nomcarrera = $nomcarrera;
        $this->listadias = $listadias;
    }
}

class Carrera
{
    //nombre de la carrera
    public $nombreCarrera;
    //lista de objeto carrera
    public $listaMaterias = array();
    //promedio total de la carrera
    public $PromedioCarrera;


    public function __construct($nombreCarrera, array $listaMaterias = [], $PromedioCarrera)
    {
        $this->nombreCarrera = $nombreCarrera;
        $this->listaMaterias = $listaMaterias;
        $this->PromedioCarrera = $PromedioCarrera;
    }
}

class Materias1
{
    public $Materia;
    public $valorGrupo;
    public $valorMateria;


    public function __construct($Materia, $valorGrupo, $valorMateria)
    {
        $this->Materia = $Materia;
        $this->valorGrupo = $valorGrupo;
        $this->valorMateria = $valorMateria;
    }
}




class HoraClase
{
    //grupo
    // Atributos
    public $nombreMateria;
    public $creditos;
    public $profesor;
    public $tipo;
    public $horas;
    public $dias;
    public $lunes;
    public $martes;
    public $miercoles;
    public $jueves;
    public $viernes;
    public $sabado;
    public $cupo;
    public $salon;


    public function __construct($nombreMateria, $creditos, $profesor, $tipo, $horas, $dias, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $cupo, $salon)
    {
        $this->nombreMateria = $nombreMateria;
        $this->creditos = $creditos;
        $this->profesor = $profesor;
        $this->tipo = $tipo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->lunes = $lunes;
        $this->martes = $martes;
        $this->miercoles = $miercoles;
        $this->jueves = $jueves;
        $this->viernes = $viernes;
        $this->sabado = $sabado;
        $this->cupo = $cupo;
        $this->salon = $salon;
    }

    public function __toString()
    {
        $dato1 = "hola";
        foreach ($this->listaMaterias as $c) {
            $dato1 = $c;
        }
        return $this->nombreCarrera . "<br>" . $dato1;
    }
}


/*PROPUESTA*/ 
//En construccion
class Horas
{
    //aqui se insertara disponible/ocupado dando referencia a la hora
    public $ocho;
    public $nueve;
    public $diez;
    public $once;
    public $doce;
    public $una;
    public $dos;
    public $tres;
    public $cuatro;
    public $cinco;
    public $seis;
    public $siete;
    public $ochoPM;
    public $nuevePM;
}

class Dia
{
    //El nombre del dia
    public $dia;
    //lista de el objeto hora que debemos verificar para insertar
    public $listaHoras = array();
}

class HorarioFinal
{
    //necesitamos recorrer al final de la insercion para hacer una valoracion
    public $HoraInicial;
    //para ver cuando acaba el horario
    public $Horafinal;
    //valoracion
    public $HorasLibresTotales;
    //lista de Dias (Se que esta bien puerco pensar en una lista de lista de listas)
    public $ListaDias = array();
}

//FIN CLASES


class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['carreras'] = carreras::paginate(10);

        return view('pages/carreras/listaCarreras', $datos);
    }

    public function funcion1(string $nombre)
    {
        //
        $var1 = $nombre; //Recibe el nombre del archivo

        return response()->json($var1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->hasfile('excel') || $request->hasfile('grupos')) {

            //Primer archivo MPN
            $file = $request->file('excel');
            $name = $file->getClientOriginalName();
            $file->move(\public_path() . '/archivos', $name);

            // Segundo archivo "Horarios Completos"
            $file2 = $request->file('grupos');
            $name2 = $file2->getClientOriginalName();
            $file2->move(\public_path() . '/archivos', $name2);

            // Generar validaciones de empalmes de horarios de materias absolutas o materia tipo 1







            //empezamos a crear
            //LISTAS
            //echo "<h1> materias unicas </h1>";

            //aqui esta lo que buscaba ya esta hechoooooooooooooooo
            //Se optiene la informacion del segundo documento
            //Toda la informacion del segundo documento HORACLASE
            $listaGrupos = $this->leeHorariosCompletos($name2);

            //se obtiene informacion del primer documento pero tambien otros calculados
            $listaFinal = $this->Carreras($name);

            //con este se hace recorrido sobre los datos previamente 
            $this->AsignaValor($listaFinal, $listaGrupos);

            //Este solo sirve para imprimir
            $this->Imprime($listaFinal);

            $listaPrioridad = $this->OrdenInscripcion($listaFinal);

            

            echo '<h2>'."Orden de Inscripcion".'</h2>';
            $this->ImprimeOrden($listaPrioridad,$listaFinal);

            $this->AsignaHoras($listaFinal, $listaGrupos);

            

            /*foreach($listaPrioridad as $lp)
            {
                echo $lp;
                echo '<br>';
            }*/
        } else {
            return "Fallo al cargar archivo, intenta de nuevo";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function show(Carreras $carreras)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function edit(Carreras $carreras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carreras $carreras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carreras $carreras)
    {
        //
    }



    public function Imprime($listaFinal)
    {
        foreach ($listaFinal as $lf) {
            echo '<h2>' . $lf->nombreCarrera . '</h2>';

            // ordenamiento de las materias

            uasort($lf->listaMaterias, array($this, 'sbo'));


            foreach ($lf->listaMaterias as $listass) {
                echo $listass->Materia . '       ';
                echo 'Valor por Grupo: ' . $listass->valorGrupo . '       ';
                echo 'Valor por Materia: ' . $listass->valorMateria . '       ';
                echo '<br>';
            }
            echo '<br>';
            echo 'El promedio de la carrera es: ' . $lf->PromedioCarrera;
        }
    }

    function sbo($a, $b)
    {
        return $a->valorGrupo - $b->valorGrupo;
    }

    //Fucion que nos ayuda a leer y guardar informacion DEL SEGUNDO DOCUMENTO NOS DA TODA LA INFORMACION
    public function leeHorariosCompletos($nombreArchivo)
    {
        $rutaArchivo = \public_path() . '/archivos/' . $nombreArchivo;
        $documento = IOFactory::load($rutaArchivo);

        # obtenemos la primera celda para la validacion del archivo CPM
        $coordenadas = "A1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw = $celda->getValue();


        // Sin comillas para objetos
        $listaGrupos = array();

        $nombreMateria = "";
        $creditos = "";
        $profesor = "";
        $tipo = "";
        $horas = "";
        $dias = "";
        $lunes = "";
        $martes = "";
        $miercoles = "";
        $jueves = "";
        $viernes = "";
        $sabado = "";
        $cupo = "";
        $salon = "";


        foreach ($hojaActual->getRowIterator() as $fila) {
            foreach ($fila->getCellIterator() as $celdaPrueba) {

                # El valor, así como está en el documento
                $valorRaw = $celdaPrueba->getValue();


                # Fila, que comienza en 1, luego 2 y así...
                $fila = $celdaPrueba->getRow();
                # Columna, que es la A, B, C y así...
                $columna = $celdaPrueba->getColumn();


                if ($valorRaw != "") {
                    if ($columna == "A") {
                        if ($valorRaw != "materia") {
                            $nombreMateria = $valorRaw;
                        }
                    }
                    if ($columna == "B") {
                        if ($valorRaw != "creditos") {
                            $creditos = $valorRaw;
                        }
                    }
                    if ($columna == "C") {
                        if ($valorRaw != "profesor") {
                            $profesor = $valorRaw;
                            //echo $profesor."<br>";
                        }
                    }
                    if ($columna == "D") {
                        if ($valorRaw != "tipo") {
                            $tipo = $valorRaw;
                        }
                    }
                    if ($columna == "E") {
                        if ($valorRaw != "horas") {
                            $horas = $valorRaw;
                        }
                    }
                    if ($columna == "F") {
                        if ($valorRaw != "dias") {
                            $dias = $valorRaw;
                        }
                    }
                    if ($columna == "G") {
                        if ($valorRaw != "lunes") {
                            $lunes = $valorRaw;
                        }
                    }
                    if ($columna == "H") {
                        if ($valorRaw != "martes") {
                            $martes = $valorRaw;
                        }
                    }
                    if ($columna == "I") {
                        if ($valorRaw != "miercoles") {
                            $miercoles = $valorRaw;
                        }
                    }
                    if ($columna == "J") {
                        if ($valorRaw != "jueves") {
                            $jueves = $valorRaw;
                        }
                    }
                    if ($columna == "K") {
                        if ($valorRaw != "viernes") {
                            $viernes = $valorRaw;
                        }
                    }
                    if ($columna == "L") {
                        if ($valorRaw != "sabado") {
                            $sabado = $valorRaw;
                        }
                    }
                    if ($columna == "M") {
                        if ($valorRaw != "cupo") {
                            $cupo = $valorRaw;
                        }
                    }
                    if ($columna == "N") {
                        if ($valorRaw != "salon") {
                            $salon = $valorRaw;

                            // Crea objeto
                            $Grupo = new HoraClase($nombreMateria, $creditos, $profesor, $tipo, $horas, $dias, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $cupo, $salon);

                            // Inserta el objeto en el array de listaGrupos
                            array_push($listaGrupos, $Grupo);
                        }
                    }
                }
            }
        }



        return $listaGrupos;
    }

    //aqui de dos listas que teniamos ahora se convirtio en una sola
    //ahora en una sola lista de objetos se puede acceder a las carreras con sus propiedades
    //y a las materias por carrera con sus propiedades
    //SOLO DEL PRIMER DOCUMENTOOOOOOOOOOOOOOOOOO MPN
    public function Carreras($nombreArchivo)
    {
        $rutaArchivo = \public_path() . '/archivos/' . $nombreArchivo;
        $documento = IOFactory::load($rutaArchivo);

        # obtenemos la primera celda para la validacion del archivo CPM
        $coordenadas = "A1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw = $celda->getValue();


        $listaCarreras = array("");
        $listaMaterias = array();

        // Sin comillas para objetos
        $listaCarreraFinal = array();


        $nombreDeCarrera = "";
        $band = 0;
        foreach ($hojaActual->getRowIterator() as $fila) {
            foreach ($fila->getCellIterator() as $celdaPrueba) {

                # El valor, así como está en el documento
                $valorRaw = $celdaPrueba->getValue();


                # Fila, que comienza en 1, luego 2 y así...
                $fila = $celdaPrueba->getRow();
                # Columna, que es la A, B, C y así...
                $columna = $celdaPrueba->getColumn();


                if ($valorRaw != "") {
                    if ($columna == "B" || $columna == "D" || $columna == "C") {
                        #Aqui metemos las materias en una lista
                        #valorRaw nos da lo que tenemos en las celdas
                        if ($columna == "B") {
                            if ($valorRaw != "carrera") {
                                array_push($listaCarreras, $valorRaw);
                                if ($band == 0) {
                                    $nombreDeCarrera = $valorRaw;
                                    $band = 1;
                                } else {
                                    if ($nombreDeCarrera != $valorRaw) {

                                        // CREACION DEL OBJETO
                                        $carr = new Carrera($nombreDeCarrera, $listaMaterias, "");
                                        // Inserta el objeto en el array de materiasPorCarrera
                                        array_push($listaCarreraFinal, $carr);

                                        while (count($listaMaterias)) array_pop($listaMaterias);
                                        $band = 0;
                                    }
                                }
                            }
                        }
                        if ($columna == "D") {


                            if ($valorRaw != "materia") {
                                $mat = new Materias($valorRaw, "", "");
                                array_push($listaMaterias, $mat);
                            }
                        }
                    }
                }
            }
        }
        return $listaCarreraFinal;
    }


    //AQUI SE JUNTAN LAS DOS LISTAS ANTERIORES DE LOS DOS COUMENTOS Y SO OBTIENEN DATOS IMPORTNATES
    public function AsignaValor($listaCarreras, $listaMateriasGlobal)
    {
        $contador = 0;
        foreach ($listaCarreras as $lf) {
            //echo '<h2>'.$lf->nombreCarrera.'</h2>';
            foreach ($lf->listaMaterias as $listass) {
                //ahi accedemos a cada materia de cada carrera
                foreach ($listaMateriasGlobal as $mg) {
                    //echo 'Se compara'.$listass->Materia.'Contra: '.$mg->nombreMateria;
                    //echo "Se compara ".$mg->nombreMateria."contra:  ".$listass->Materia."  ";
                    if ($mg->nombreMateria == $listass->Materia) {
                        //echo "COINCIDEN";
                        $contador = $contador + 1;
                        //echo '<br>';
                    } else {
                        //echo '   NO entro'.'<br>';
                    }
                }
                $listass->valorGrupo = $contador;
                //echo 'La materia: '.$listass->Materia.'          es de valor: '.$contador;
                //echo '<br>';
                $contador = 0;
            }
        }


        $contadorM = 0;
        foreach ($listaCarreras as $lf) {
            //echo '<h2>'.$lf->nombreCarrera.'</h2>';
            foreach ($lf->listaMaterias as $listass) {
                //ahi accedemos a cada materia de cada carrera
                foreach ($listaCarreras as $lf2) {
                    foreach ($lf2->listaMaterias as $mg) {
                        //echo 'Se compara'.$listass->Materia.'Contra: '.$mg->Materia;
                        if ($mg->Materia == $listass->Materia) {
                            $contadorM = $contadorM + 1;
                            // echo '   entro'.'<br>';
                        } else {
                            // echo '   NO entro'.'<br>';
                        }
                    }
                }
                $listass->valorMateria = $contadorM;
                //echo 'La materia: '.$listass->Materia.'          es de valor Materia: '.$listass->valorMateria;
                //echo '<br>';
                $contadorM = 0;
            }
        }

        $contadorMaterias = 0;
        $acumulador = 0;
        foreach ($listaCarreras as $lf) {
            // echo '<h2>'.$lf->nombreCarrera.'</h2>';
            foreach ($lf->listaMaterias as $listass) {

                $contador = $contador + 1;
                $acumulador = $acumulador + $listass->valorGrupo;
            }
            $numero =  round($acumulador / $contador, 1, PHP_ROUND_HALF_UP);
            $lf->PromedioCarrera = $numero;
        }
    }

    //DEFINIMOS MATEMATICAMENTE QUE CARRERA ES MAS IMPORTANTE DE INSCRIBIR PRIMERO
    public function OrdenInscripcion($listaFinal)
    {
        //ordenamos los promedios
        $listaFinalOrdA = array();


        foreach ($listaFinal as $lf) {
            //echo '<h2>'.$lf->nombreCarrera.'</h2>';
            //echo 'El promedio de la carrera es: '.$lf->PromedioCarrera;
            $aux = $lf->PromedioCarrera;
            array_push($listaFinalOrdA, $aux);
        }

        sort($listaFinalOrdA);
        //$listaFinalOrd = arsort($listaFinalOrdA);
        /*foreach($listaFinalOrdA as $fin)
             {
                 echo $fin;
                 echo'<br>';
             }*/
        return $listaFinalOrdA;
    }


    //SOLO ES PARA IMPRIMIR EL ORDEN
    public function ImprimeOrden($listaOrdenada, $lfinal)
    {
        $listaOrdenCarreras = array();
        $bandera = 0;
        $orden = 1;
        foreach ($listaOrdenada as $lfa) {
            foreach ($lfinal as $lfi) {
                if ($lfa == $lfi->PromedioCarrera); {
                    echo 'Carrera No: ' . $orden . "     ";
                    echo $lfi->nombreCarrera . "      ";
                    echo "   " . $lfi->PromedioCarrera;
                    $orden++;
                    array_push($listaOrdenCarreras, $lfi->nombreCarrera);
                    echo '<br>';
                }
            }
            //$bandera = $bandera + 1;
            //echo '<h2>'.$bandera.'</h2>';
            break;
        }
        return $listaOrdenCarreras;
    }


<<<<<<< HEAD
    public function AsignaHoras($listaFin, $listaGru)
=======
    public function llenaHorario($listaFin)
    {
        foreach($listaFin as $lf)
        {
            echo '<h2>'.$lf->nombreCarrera.'</h2>';
            foreach($lf->listaMaterias as $listass){
                echo $listass->Materia;
                echo '<br>';
                $referencia = 1;
                foreach($listaGru as $lg)
                {
                    if($listass->Materia == $lg->nombreMateria)
                    {

                        
                    }
                }
            }
        }


    }


    public function AsignaHoras($listaFin,$listaGru)
>>>>>>> 401589a4e6a496370a242ee0f7305bfcb6702cd6
    {

        foreach ($listaFin as $lf) {
            echo '<h2>' . $lf->nombreCarrera . '</h2>';
            foreach ($lf->listaMaterias as $listass) {
                echo $listass->Materia;
                echo '<br>';
                $referencia = 1;
                foreach ($listaGru as $lg) {
                    if ($listass->Materia == $lg->nombreMateria) {
                        echo "Opcion Numero: " . $referencia . "     ";
                        echo "lunes: " . $lg->lunes . "       ";
                        echo "martes: " . $lg->martes . "       ";
                        echo "Miercoles: " . $lg->miercoles . "       ";
                        echo "Jueves: " . $lg->jueves . "       ";
                        echo "viernes: " . $lg->viernes . "       ";
                        echo "Sabado: " . $lg->sabado . "       ";
                        echo '<br>';
                        $referencia++;
                    }
                }
            }
        }
    }
}
