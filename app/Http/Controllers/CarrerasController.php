<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;


//$listaMateriasxCarrera-> variable que ya tiene lista de carrera
// desglosa (abs,unicas y normales)

Class PlantillaXCarrera
{
    // solo sera un valor entero para saber el numero de plantillas
    public $Carrera;
    public $nombreMateria;
    public $lunes;
    public $martes;
    public $miercoles;
    public $jueves;
    public $viernes;
    public $sabado;
    //con esto buscaremos la hora en la que se imparte

    public function __construct($Carrera,$nombreMateria,$lunes, $martes, $miercoles, $jueves, $viernes, $sabado)
    {
        $this->Carrera = $Carrera;
        $this->nombreMateria = $nombreMateria;
        $this->lunes = $lunes;
        $this->martes = $martes;
        $this->miercoles = $miercoles;
        $this->jueves = $jueves;
        $this->viernes = $viernes;
        $this->sabado = $sabado;
    }
}

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




    public function __construct($Carrera,$nombreMateria,$lunes, $martes, $miercoles, $jueves, $viernes, $sabado)
    {
        $this->Carrera = $Carrera;
        $this->nombreMateria = $nombreMateria;
        $this->lunes = $lunes;
        $this->martes = $martes;
        $this->miercoles = $miercoles;
        $this->jueves = $jueves;
        $this->viernes = $viernes;
        $this->sabado = $sabado;
    }
}




class PlantillasXCarreras
{
    // Atributos
    public $NumeroDePlantilla;

    public $Horario = array(
        "Hora" => array( 
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
    "Lunes" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre",  
    ), 
    "Martes" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre",  
    ), 
    "Miercoles" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre", 
    ),
    "Jueves" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre", 
    ), 
    "Viernes" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre", 
    ), 
    "Sabado" => array( 
        "7" => "Libre", 
        "8" => "Libre", 
        "9" => "Libre", 
        "10" => "Libre", 
        "11" => "Libre", 
        "12" => "Libre", 
        "13" => "Libre", 
        "14" => "Libre", 
        "15" => "Libre", 
        "16" => "Libre", 
        "17" => "Libre", 
        "18" => "Libre", 
        "19" => "Libre", 
        "20" => "Libre", 
        "21" => "Libre", 
    ) );


    public function __construct($NumeroDePlantilla, array $Horario = [], array $listaClaves = [])
    {
        $this->NumeroDePlantilla = $NumeroDePlantilla;
        $this->Horario = $Horario;
        //$this->listaClaves = $listaClaves;
    }

    public function __toString()
    {
        /*
        $dato1 = "hola";
        foreach ($this->listaMaterias as $c) {
            $dato1 = $c;
        }
        return $this->nombreCarrera . "<br>" . $dato1;*/
    }

    //Metodos
}



class MateriaXCarrera
{
    // Atributos
    public $nombreCarrera;
    public $listaMaterias = array("");
    public $listaClaves = array();


    public function __construct($nombreCarrera, array $listaMaterias = [], array $listaClaves = [])
    {
        $this->nombreCarrera = $nombreCarrera;
        $this->listaMaterias = $listaMaterias;
        $this->listaClaves = $listaClaves;
    }

    public function __toString()
    {
        $dato1 = "hola";
        foreach ($this->listaMaterias as $c) {
            $dato1 = $c;
        }
        return $this->nombreCarrera . "<br>" . $dato1;
    }

    //Metodos
}

class AbsolutasXCarrera
{
    // Atributos
    public $nombreCarrera;
    public $listaAbsolutas = array("");
    


    public function __construct($nombreCarrera, array $listaAbsolutas = [])
    {
        $this->nombreCarrera = $nombreCarrera;
        $this->listaAbsolutas = $listaAbsolutas;
    }

    public function __toString()
    {
        $dato1 = "hola";
        foreach ($this->listaAbsolutas as $c) {
            $dato1 = $c;
        }
        return $this->nombreCarrera . "<br>" . $dato1;
    }

    //Metodos
}

class HoraClase
{
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

    //Metodos
}

class Horario
{
    // Atributos
    public $nombreCarrera;
    public $lunes = array("");
    public $martes = array("");
    public $miercoles = array("");
    public $jueves = array("");
    public $viernes = array("");
    public $sabado = array("");


    public function __construct($nombreCarrera, array $lunes = [], array $martes = [], array $miercoles = [], array $jueves = [], array $viernes = [], array $sabado = [])
    {
        $this->nombreCarrera = $nombreCarrera;
        $this->lunes = $lunes;
        $this->martes = $martes;
        $this->miercoles = $miercoles;
        $this->jueves = $jueves;
        $this->viernes = $viernes;
        $this->sabado = $sabado;
    }

    //Metodos
}


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
        $var1 = $nombre;//Recibe el nombre del archivo

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
            $file = $request->file('excel');
            $name = $file->getClientOriginalName();
            $file->move(\public_path() . '/archivos', $name);

            // Segundo archivo
            $file2 = $request->file('grupos');
            $name2 = $file2->getClientOriginalName();
            $file2->move(\public_path() . '/archivos', $name2);

            //empezamos a crear
            echo "<h1> materias unicas </h1>";
            //Creacion de las materias por carreras regresa {}
            $listaMateriasxCarrera = $this->leeMPC($name);
            
            /*foreach($listaMateriasxCarrera as $mpc)
            {
                    foreach ($mpc->listaClaves as $d) {
                        echo $d . "<br>";
                    }

            }*/

            $listaGrupos = $this->leeHorariosCompletos($name2);
           // $listaABS = $this->ObtenPlantilla($listaMateriasxCarrera,$listaGrupos);
           // $listashoras = $this->llenaPlantillas($listaABS);
            $listaFinal = $this->Carreras($name);
            $this->AsignaValor($listaFinal,$listaGrupos);

            foreach($listaFinal as $lf)
            {
                echo '<h2>'.$lf->nombreCarrera.'</h2>';
                foreach($lf->listaMaterias as $listass){
                        echo $listass->Materia.'       '; 
                        echo 'Valor por Grupo: '.$listass->valorGrupo.'       ';
                        echo 'Valor por Materia: '.$listass->valorMateria.'       ';     
                        echo '<br>';
                }
                echo'<br>';
                echo 'El promedio de la carrera es: '.$lf->PromedioCarrera;
                
            }
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
    

    public function leeMPC($nombreArchivo)
    {
        $rutaArchivo = \public_path() . '/archivos/' . $nombreArchivo;
        $documento = IOFactory::load($rutaArchivo);

        # obtenemos la primera celda para la validacion del archivo CPM
        $coordenadas = "A1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw = $celda->getValue();


        $listaCarreras = array("");
        $listaMaterias = array("");

        // Sin comillas para objetos
        $listaMateriasxCarrera = array();

        $listaClaves = array();


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
                                        $Carrera1 = new MateriaXCarrera($nombreDeCarrera, $listaMaterias,$listaClaves);

                                        // Inserta el objeto en el array de materiasPorCarrera
                                        array_push($listaMateriasxCarrera, $Carrera1);

                                        while (count($listaMaterias)) array_pop($listaMaterias);
                                        while (count($listaClaves)) array_pop($listaClaves);

                                        $band = 0;
                                    }
                                }
                            }
                        }
                        if ($columna == "D") {


                            if ($valorRaw != "materia") {
                                array_push($listaMaterias, $valorRaw);
                            }
                        }else{
                            if ($columna == "C") {


                                if ($valorRaw != "cve_materia") {
                                    array_push($listaClaves, $valorRaw);
                                }
                            }
                        }
                    }
                }
            }
        }



        return $listaMateriasxCarrera;
    }

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

    //ayuda
    public function ObtenPlantilla($listaCarrerasyMaterias,$listaMateriasTotales)
    {
        $contador = 0;
        $listaABS = array();
          foreach ($listaCarrerasyMaterias as $c) {

                echo "<b>" . $c->nombreCarrera . "</b> <br>";
                foreach ($c->listaMaterias as $d) {
                    $tempCarrera = $c->nombreCarrera;
                    foreach($listaMateriasTotales as $mt)
                    {
                        if($d == $mt->nombreMateria)
                        {
                            $contador = $contador + 1;
                            $tempLun = $mt->lunes;
                            $tempMar = $mt->martes;
                            $tempMie = $mt->miercoles;
                            $tempJue = $mt->jueves;
                            $tempVie = $mt->viernes;
                            $tempSab = $mt->sabado;
                        }
                    }
                    if($contador == 1)
                    {
                        //es materia ABS
                        //echo 'la materia: ' .$d. ' Es absoluta';
                        //c->Carrera; d->Materia
                        $tempLun;
                        $tempMar;
                        $tempMie;
                        $tempJue;
                        $tempVie;
                        $tempSab;
                        $plantilla = new PlantillaXCarrera($tempCarrera,$d,$tempLun,$tempMar,$tempMie,$tempJue,$tempVie,$tempSab);
                        echo "carrera: ".$c->nombreCarrera. ' Materia: '.$d. ' Lunes: '.$tempLun.''. ' Martes: '.$tempMar.''. ' Miercoles: '.$tempMie.''. ' Jueves: '.$tempJue.''. ' Viernes: '.$tempVie.''. ' Sabado: '.$tempSab;
                        array_push($listaABS,$plantilla);
                        $contador = 0;
                        echo'<br>';
                    }else{
                        //se reinicia contador
                        $contador = 0;
                    }
                }
               //echo "<br>";
            }

        return $listaABS;    
    }

    //Miguel
    public function llenaPlantillas($listaAbs)
    {
        $unicas = array( );
        $noUnicas = array();
        $unicaxC = array();
        foreach($lMatxCarr as $carr)//Carrera
        {
            //echo "<br>" ."***". $carr ."***". "</br>";
        //{   
            $unicaxC = array();
            foreach($carr->listaClaves as $cve)//Materias
            {
                    //es la primera vez que entra
                    echo'<h2>'.'Carrera: '.$a->Carrera.'</h2>';
                    echo $Lun = $a->lunes;
                    echo '   ';
                    echo $Materia = $a->nombreMateria;
                    /*$Lun = $a->lunes;
                    $mar = $a->lunes;
                    $mie = $a->lunes;
                    $jue = $a->lunes;
                    $vie = $a->lunes;
                    $sab = $a->lunes;*/
                    //$rest = substr($Lun,0, -5);
                    echo '<br>';
                                
            }
            return $listahoras;
    }




    //aqui de dos listas que teniamos ahora se convirtio en una sola
    //ahora en una sola lista de objetos se puede acceder a las carreras con sus propiedades
    //y a las materias por carrera con sus propiedades
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
                                        $carr = new Carrera($nombreDeCarrera, $listaMaterias,"");
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
                                $mat = new Materias($valorRaw,"","");
                                array_push($listaMaterias, $mat);
                            }
                        }
                    }
                }
            }
        }
        return $listaCarreraFinal;
    }

    public function AsignaValor($listaCarreras,$listaMateriasGlobal)
    {
            $contador = 0;
            foreach($listaCarreras as $lf)
            {
                //echo '<h2>'.$lf->nombreCarrera.'</h2>';
                foreach($lf->listaMaterias as $listass){
                    //ahi accedemos a cada materia de cada carrera
                    foreach($listaMateriasGlobal as $mg)
                    {
                        //echo 'Se compara'.$listass->Materia.'Contra: '.$mg->nombreMateria;
                       if($mg->nombreMateria == $listass->Materia)
                       {
                            $contador = $contador + 1;
                            //echo '   entro'.'<br>';
                       }else{
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
            foreach($listaCarreras as $lf)
            {
                //echo '<h2>'.$lf->nombreCarrera.'</h2>';
                foreach($lf->listaMaterias as $listass){
                    //ahi accedemos a cada materia de cada carrera
                    foreach($listaCarreras as $lf2)
                    {
                            foreach($lf2->listaMaterias as $mg)
                        {
                            //echo 'Se compara'.$listass->Materia.'Contra: '.$mg->Materia;
                        if($mg->Materia == $listass->Materia)
                        {
                                $contadorM = $contadorM + 1;
                            // echo '   entro'.'<br>';
                        }else{
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
            foreach($listaCarreras as $lf)
            {
               // echo '<h2>'.$lf->nombreCarrera.'</h2>';
                foreach($lf->listaMaterias as $listass){

                    $contador = $contador + 1;
                    $acumulador = $acumulador + $listass->valorGrupo;
                }
                $lf->PromedioCarrera = ($acumulador/$contador);
                //
            }
    }





    public function GeneraPlantillas($matUnicas)
    {

        foreach($matUnicas as $xcarr)
        {
            foreach($xcarr as $hrs)
            {

            }
        }
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
            
    }


}


