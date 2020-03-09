<?php

namespace App\Http\Controllers;

use App\Carreras;
use Illuminate\Http\Request;
# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;


class MateriaXCarrera
{
    // Atributos
    public $nombreCarrera;
    public $listaMaterias = array("");


    public function __construct($nombreCarrera, array $listaMaterias = [])
    {
        $this->nombreCarrera = $nombreCarrera;
        $this->listaMaterias = $listaMaterias;
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

            $listaMateriasxCarrera = $this->leeMPC($name);
            $listaGrupos = $this->leeHorariosCompletos($name2);


            echo "<h1> materias unicas </h1>";
            $matUnicas= $this->ObtenUnicas($listaMateriasxCarrera, $listaGrupos);//Obtiene las materias unicas

            $archivos = array("MateriasxCarrera"=>$listaMateriasxCarrera, "Grupos"=>$listaGrupos);
            // IMPRESIONES
            // Imprime Lista de materias por carrera
      /*      foreach ($listaMateriasxCarrera as $c) {

                echo "<b>" . $c->nombreCarrera . "</b> <br>";
                foreach ($c->listaMaterias as $d) {
                    echo $d . "<br>";
                }

                echo "<br>";
            }
*/
            // IMPRESIONES
            // Imprime Lista de materias total
            echo
            "<table >
            <thead >
            <tr>
            <th>Nombre</th>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
            </tr>
            </thead>
            ";

            
            foreach($matUnicas as $carr)
            {
                //echo "<tr> <td>". $carr->nombreCarrera . "</td> </tr> " ;
                foreach($carr as $c)
                {
                    echo "<tr> <td>" . $c->nombreMateria . "</td> 
                    <td>" . $c->horas . "</td>  
                    <td>" . $c->lunes . "</td>
                    <td>" . $c->martes . "</td>
                    <td>" . $c->miercoles . "</td>
                    <td>" . $c->jueves . "</td>
                    <td>" . $c->viernes . "</td>
                    
                    </br>";
                }
            }
                
            /*
            foreach ($archivos["Grupos"] as $c) {
                echo "<tr> <td>" . $c->nombreMateria . "</td> 
                            <td>" . $c->horas . "</td>  
                            <td>" . $c->lunes . "</td>
                            <td>" . $c->martes . "</td>
                            <td>" . $c->miercoles . "</td>
                            <td>" . $c->jueves . "</td>
                            <td>" . $c->viernes . "</td>
                            
                            </br>";
            }*/
            
            echo "</table>";

            //return view('pages/Carreras/listaCarreras',$matUnicas);
            return "";
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
                                        $Carrera1 = new MateriaXCarrera($nombreDeCarrera, $listaMaterias);

                                        // Inserta el objeto en el array de materiasPorCarrera
                                        array_push($listaMateriasxCarrera, $Carrera1);

                                        while (count($listaMaterias)) array_pop($listaMaterias);

                                        $band = 0;
                                    }
                                }
                            }
                        }
                        if ($columna == "D") {


                            if ($valorRaw != "materia") {
                                array_push($listaMaterias, $valorRaw);
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

    public function ObtenUnicas($lMatxCarr, $lGrpos)//Carrera, Grupos
    {
        $unicas = array( );
        $noUnicas = array();
        $unicaxC = array();
        foreach($lMatxCarr as $carr)//Carrera
        {
            
            foreach($carr->listaMaterias as $mat)//Materias
            {
                
                $matunica = $this->ObtenMateriaUnica($lGrpos, $mat);//Solo obtiene la materia si es unica

                if($matunica != null)
                {
                    
                    array_push($unicaxC,  $matunica);//agrega la materia unica
                }

            }


            $unicas = array($carr->nombreCarrera=>$unicaxC);
            
        }
        return $unicas;
    }

    public function ObtenMaterias($lGrpos, $mat)
    {
        $absoluta = array();
        $cont = 0;
        foreach($lgpos as $gpo)
        {
            if($mt == $gpo->nombreMateria )//Verifica que ambos nombres sean iguales
            {

                array_push($absoluta, $gpo);
                $cont = 1;
            }
        }

        if($cont == 1)
        {

            return $absoluta;
        }
        //return $abs;

    }

    

    public function ObtenMateriaUnica($lgpos, $mt)
    {
        $absoluta = array();
        $cont = 0;
        $abs;

        foreach($lgpos as $gpo)
        {
            if($gpo->nombreMateria == $mt)
            {
                $cont = $cont+1;

                if($cont == 1)
                {
                    $abs = $gpo;  
                }
                //array_push($absoluta,$gpo);
            }
        }
        if($cont == 1)
        {
            
            return $abs;
        }
       
    }
}
