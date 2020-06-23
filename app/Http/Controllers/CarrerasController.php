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


    public function __construct($Materia, $valorGrupo, $valorMateria)
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
        $this->profesor = $profesor;$this->profesor = $profesor;
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


class Hora1
{
    public $hora; //08-09  
    public $campo; // Quimica
    public $carr;
    public $dias;
    public $profesor;

    public function __construct($hora, $campo, $carr,$dias,$profesor)
    {
        $this->hora = $hora;
        $this->campo = $campo;
        $this->carr = $carr;
        $this->dias = $dias;
        $this->profesor = $profesor;
    }
}

class Dia1
{
    public $dia; //lunes
    public $horas = array(); //lista de Hora1

    public function __construct($dia, array $listaHoras = [])
    {
        $this->dia = $dia;
        $this->listaHoras = $listaHoras;
    }
}

class HorarioFinal
{

    public $numeroHorario; //compu
    public $listaDia = array(); //Lunes Martes Mircoles
    //Capacidaddehorario donde nos indicara cuantas veces se puede asignar el horario creado

    public function __construct($numeroHorario, array $listaDia = [])
    {
        $this->numeroHorario = $numeroHorario;
        $this->listaDia = $listaDia;
    }
}


class Alumno
{
    public $ClaveAlumno;
    public $NombreAlumno;
    public $CalificacionAlumno;
    public $CarreraAlumno; 

    public function __construct($ClaveAlumno,$NombreAlumno,$CalificacionAlumno,$CarreraAlumno)
    {
        $this->ClaveAlumno = $ClaveAlumno;
        $this->NombreAlumno = $NombreAlumno;
        $this->CalificacionAlumno = $CalificacionAlumno;
        $this->CarreraAlumno = $CarreraAlumno;
    }
}

class AlumnoInscrito
{
    public $ClaveAlumno;
    public $NombreAlumno;
    public $CalificacionAlumno;
    public $CarreraAlumno;
    public $NumeroHorarioAsignado; 

    public function __construct($ClaveAlumno,$NombreAlumno,$CalificacionAlumno,$CarreraAlumno,$NumeroHorarioAsignado)
    {
        $this->ClaveAlumno = $ClaveAlumno;
        $this->NombreAlumno = $NombreAlumno;
        $this->CalificacionAlumno = $CalificacionAlumno;
        $this->CarreraAlumno = $CarreraAlumno;
        $this->NumeroHorarioAsignado = $NumeroHorarioAsignado;
    }
}

class AuxHorario
{
    public $Promedio;
    public $Carrera;

    public function __construct($Promedio,$Carrera)
    {
        $this->Promedio = $Promedio;
        $this->Carrera = $Carrera;
    }
}


class ErroresGrupos
{
    public $NombreCarrera;
    public $NumeroReferencia;

    public function __construct($NombreCarrera,$NumeroReferencia)
    {
        $this->NombreCarrera = $NombreCarrera;
        $this->NumeroReferecia = $NumeroReferencia;
    }
}

class ObjetoAdvErro
{
    public $ListaErroresAdvertencias = array();

    public function __construct($ListaErroresAdvertencias = [])
    {
        $this->ListaErroresAdvertencias = $ListaErroresAdvertencias;
    }
}

class HoraLibres
{
    public $numHorario;
    public $carrera;
    public $listOscio = array();
    public $ocioTotal;

    public function __construct($numHorario,$carrera, $listOscio = [], $ocioTotal )
    {
        $this->numHorario = $numHorario;
        $this->carrera = $carrera;
        $this->listOscio = $listOscio;
        $this->ocioTotal = $ocioTotal;
    }
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

        $listaHorariosFinal = array();


        if ($request->hasfile('excel') || $request->hasfile('grupos')) {


            //ARCHIVOS EXCEL

            //Primer archivo MPN
            $file = $request->file('excel');
            $name = $file->getClientOriginalName();
            $file->move(\public_path() . '/archivos', $name);

            // Segundo archivo "Horarios Completos"
            $file2 = $request->file('grupos');
            $name2 = $file2->getClientOriginalName();
            $file2->move(\public_path() . '/archivos', $name2);

            // tercer archivo "cupoCarrera"
            $file3 = $request->file('cupoCarrera');
            $name3 = $file3->getClientOriginalName();
            $file3->move(\public_path() . '/archivos', $name3);


            //LISTAS
            //echo "<h1> materias unicas </h1>";
            //aqui esta lo que buscaba ya esta hechoooooooooooooooo
            //Se optiene la informacion del segundo documento
            //Toda la informacion del segundo documento HORACLASE
            $listaGrupos = $this->leeHorariosCompletos($name2);


           // $this->PruebasCupo($name2);

            //se obtiene informacion del primer documento pero tambien otros calculados
            $listaFinal = $this->Carreras($name);

            //En listaFinal se pueden encontrar la carrera con sus materias y el valor de las mismas

            //TERCER DOCUMENTO EXCEL
            $listaAsignacionAlumnos = $this->DocumentoAlumnos($name3);

            //con este se hace recorrido sobre los datos previamente 
            $this->AsignaValor($listaFinal, $listaGrupos);

            //Este solo sirve para imprimir
            //$this->Imprime($listaFinal);

            //Lista donde vienen errores y advertencias 
            $ReporteErroresAdvertencias = $this->Errores($listaFinal,$listaGrupos);

            //Muestra en texto plano los errores y advertencias
            //$this->MostrarErroresyAdvertencias($ReporteErroresAdvertencias);

            $listaPrioridad = $this->OrdenInscripcion($listaFinal);

            //listaprioridad viene el orden BARO

            //echo '<h2>' . "Orden de Inscripcion" . '</h2>';
            //$this->ImprimeOrden($listaPrioridad, $listaFinal);


            $axc =$this->ObtenAlumnosxCarrera($listaAsignacionAlumnos);
            $this->CalculaNumeroHbloques($axc,$listaGrupos,$listaFinal);
            //$this->AsignaHoras($listaFinal, $listaGrupos);

            //ListaHorarios final ya tiene TODA la informacion de los horarios
            //carrera, materia y hora de inscripcion
            $php = $this->HorariosChidos($listaFinal, $listaGrupos,$listaPrioridad);

            //segundaOpcion
            $this->GenerarHorariosBloque($listaFinal,$listaGrupos,$listaPrioridad);



            $listaOcio = $this->HorasOcio($listaHorariosFinal);
            
            //// IMPRIMER ESTO MAS TARDE ----->
            //$this->ValorHorarios($listaHorariosFinal);
            $listaAsignacionAlumnos = $this->ordenachingon($listaAsignacionAlumnos);
            //$this->imprimeAsignacion($listaAsignacionAlumnos);
            $listaAlumnosInscritos =  $this->AsigaHorarios($listaHorariosFinal,$listaAsignacionAlumnos,$listaFinal);
            //$this->recorreLista($listaAsignacionAlumnos);

            
            //$this->imprimeAsignacion($listaAlumnosInscritos);



            //regresamos la vista
            include(app_path() . '/Horarios/Horarios.php');
            include(app_path() . '/Horarios/Alumnos.php');
            include(app_path() . '/Horarios/ListaPrioridad.php');
            include(app_path() . '/Horarios/ListaErroresAdvertencias.php');
            include(app_path() . '/Horarios/HorasOcio.php');

            
            include(app_path() . '/BD/abrir.php');

            $consulta = "SELECT * FROM lista_errores_advertencias";
                    
            $res = mysqli_query($conexion,$consulta);

            if($res->num_rows > 0)
            {
                return view('pages/Advertencias/listaErroresAdvertencias');
            }
            else
            {
                return view('pages/Carreras/listaPrioridad');
            }
            mysqli_close($conexion);

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




/*----------------------------------------------VALIDACIONES PRIMER RECORRIDO--------------------------------------------------------------*/
    public function Errores($listaFinal,$listaGrupos)
    {
        $listaAdvertencias = array("");
        $listaERRORES = array("");
        $ReporteFinal = array();
        //foreach para recorrer carrera por carrera
        foreach ($listaFinal as $lf) {
            //guardamos el nombre de la carrera
            $carrera = $lf->nombreCarrera;
        //echo '<h5>'.$carrera.'</h5>';
            //echo '<br>';
            //lista donde se va a guardar las horas de la carrera
            $listaHorasOcupada = array();
            //lista de Hora y Dia ocupada
            $listaDiaHoraOcupado = array("");
            //acomodamos la lista
            uasort($lf->listaMaterias, array($this, 'sbo'));
            //foreach para recorrer las materias de la carrera con la informacion
            foreach ($lf->listaMaterias as $listass) {
                $contadorDiasMateria = 0;
                $contadorFinalMateria = 0;
                //un if que nos alertara si algun grupo NO cuenta con grupos 
                //Esto nos dice que existe para la materia en el documento de "materia por carreras" pero no existe en el documento "Horarios completos"
                if($listass->valorGrupo != 0)
                {
                    //Solo nos interezan las materias criticas
                    if($listass->valorGrupo <= 3)
                    {
                        //si es menor o igual a 3 debemos verificar que no se empalme
                        //verificamos las horas
                        //Foreach para recorrer archivo de materias y saber el horario
                        foreach ($listaGrupos as $clave => $fila) {
                            //guardamos la variable que vamos a comparar esta variable es la que se esta recorriendo del archivo
                            //Comparamos si la materia con pocos grupos es igual al recorrido dentro del archivo 
                            $nombreM =$fila->nombreMateria;
                            //echo '<br>';
                           
                                //Si no es laboratorio
                                //se compara el nombre
                                if($nombreM == $listass->Materia)
                                {
                                    
                                    //Guardamos los primeros dos digitos de la hora en la que se INICIA la clase 
                                    $HoraInicial = substr($fila->horas, 0, 2);
                                    //Guardamos los primeros dos digitos de la hora en que se TERMINA
                                    $HoraFinal = substr($fila->horas, 3, 2);
                                    //Restamos para saber de cuantas horas es la clase 
                                    $Resta = $HoraFinal - $HoraInicial;
                                    //Si es mayor a 1 significa que la clase dura mas de una hora
                                    if($Resta>1)
                                    {
                                        $HoraReffLunes = 0;
                                        $HoraReffMartes = 0;
                                        $HoraReffMiercoles = 0;
                                        $HoraReffJueves = 0;
                                        $HoraReffViernes = 0;
                                        $HoraReffSabado = 0;
                                        //hacemos un ciclo para insertar el numero total de horas

                                        //Referencia para saber de cuantos dias es la materia
                                        if($fila->lunes == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->martes == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->miercoles == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->jueves == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->viernes == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->sabado == "")
                                        {
                                           //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }

                                        //revision dentro de la lista
                                        

                                        $unavezLunes = 0;
                                        $unavezMartes = 0;
                                        $unavezMiercoles = 0;
                                        $unavezJueves = 0;
                                        $unavezViernes = 0;
                                        $unavezSabado = 0;
                                        for($i = 0; $i<$Resta; $i++)
                                        {
                                            if($fila->lunes != "")
                                            {
                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    //poner un if para solo una entrada al contador
                                                    if($unavezLunes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezLunes = 1;
                                                    } 
                                                    $HoraReffLunes == $HoraReffLunes + 1;
                                                }
                                            }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    if($unavezMartes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMartes = 1;
                                                    } 
                                                    $HoraReffMartes == $HoraReffMartes + 1;
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    if($unavezMiercoles == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMiercoles = 1;
                                                    } 
                                                    $HoraReffMiercoles == $HoraReffMiercoles + 1;
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    if($unavezJueves == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezJueves = 1;
                                                    } 
                                                    $HoraReffJueves == $HoraReffJueves + 1;
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    if($unavezViernes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezViernes = 1;
                                                    } 
                                                    $HoraReffViernes == $HoraReffViernes + 1;
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    if($unavezSabado == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezSabado = 1;
                                                    } 
                                                    $HoraReffSabado == $HoraReffSabado + 1;
                                                }
                                            }
                                            //TERMINACION DE COMPARACION
                                        }
                                        if($contadorFinalMateria == $contadorDiasMateria)
                                        {
                                            //echo $listass->valorGrupo;
                                            
                                            $brincoLunes = 0;
                                            $brincoMartes = 0;
                                            $brincoMiercoles = 0;
                                            $brincoJueves = 0;
                                            $brincoViernes = 0;
                                            $brincoSabado = 0;
                                            //echo '<h5>'.$fila->tipo.'</h5>';
                                            for($i = 0; $i<$Resta; $i++)
                                            {
                                                    //significa que si hay cupo en la hora deseada con los dias deseados
                                                    if($fila->tipo == "L")
                                                    {
                                                        //echo '<h5>'.$fila->tipo.'</h5>';
                                                        //Si es laboratorio
                                                        if($fila->lunes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";       
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoLunes == 0)
                                                            {
                                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                $brincoLunes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->martes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMartes == 0)
                                                            {
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                $brincoMartes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                            //echo '<br>';
                                                            }
                                                            $HoraReffMartes = substr($fila->martes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                            $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                            array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                            $HoraReffMartes = $HoraReffMartes + 1;
                                                        //echo '<br>';
                                                        }
                                                        if($fila->miercoles == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMiercoles == 0)
                                                            {
                                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                $brincoMiercoles = 1;
                                                            //echo '<br>';
        
                                                            }else{
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->jueves == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoJueves == 0)
                                                            {
                                                                $horaDia = $HoraInicial."jueves";
                                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                $brincoJueves = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->viernes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoViernes == 0)
                                                            {
                                                                $horaDia = $HoraInicial." viernes";
                                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                $brincoViernes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                            //echo '<br>';
                                                            }
                                                           
                                                        }
                                                        if($fila->sabado == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoSabado == 0)
                                                            {
                                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                            //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                                $brincoSabado = 1;
                                                            }else{
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                            //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                            }
                                                        }
                                                    }else{
                                                        //echo '<h5>'.$fila->tipo.'</h5>';
                                                        //SI NO es laboratorio
                                                        if($fila->lunes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";       
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoLunes == 0)
                                                            {
                                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                $brincoLunes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->martes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMartes == 0)
                                                            {
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                $brincoMartes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                            //echo '<br>';
                                                            }
                                                            $HoraReffMartes = substr($fila->martes, 0, 2);
                                                        //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                            $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                            array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                            $HoraReffMartes = $HoraReffMartes + 1;
                                                        //echo '<br>';
                                                        }
                                                        if($fila->miercoles == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMiercoles == 0)
                                                            {
                                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                $brincoMiercoles = 1;
                                                            //echo '<br>';
        
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->jueves == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoJueves == 0)
                                                            {
                                                                $horaDia = $HoraInicial."jueves";
                                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                $brincoJueves = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                            //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->viernes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoViernes == 0)
                                                            {
                                                                $horaDia = $HoraInicial." viernes";
                                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                            //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                $brincoViernes = 1;
                                                            //echo '<br>';
                                                            }else{
                                                            //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                            //echo '<br>';
                                                            }
                                                           
                                                        }
                                                        if($fila->sabado == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoSabado == 0)
                                                            {
                                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                            //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                                $brincoSabado = 1;
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                            //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                            }
                                                        }
                                                    }
                                            }
                                        }else{
                                            //significa que hubo un empalme 
                                            if($listass->valorGrupo==1)
                                            {
                                                //si existe pues se alerta
                                                $error = "En la carrera: ".$lf->nombreCarrera."La materia ".$nombreM." es a la hora: ".$HoraInicial."Con el profesor ".$fila->profesor." ".'ERROR: LA MATERIA ES UNICA Y SE EMPALMA CON OTRA MATERIA CRITICA';
                                                //metemos el texto completo a la lista de errores
                                                array_push($listaERRORES,$error);
                                            }else{
                                                //si existe pues se alerta
                                                $advertencia = "En la carrera: ".$lf->nombreCarrera."La materia ".$nombreM." es a la hora: ".$HoraInicial."Con el profesor ".$fila->profesor.'ADVERTENCIA: La hora ya esta ocupada pero tiene mas de una opcion';
                                               
                                                array_push($listaAdvertencias,$advertencia);
                                            }
                                        }
                                        //si eres de una sola hora
                                        //----------------------------------------------------------------------------------------
                                    }else{
                                        //Si no es mayor a 1 significa que la clase solo es de una hora
                                          
                                        //Referencia para saber de cuantos dias es la materia
                                          if($fila->lunes == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
                                          if($fila->martes == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
                                          if($fila->miercoles == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
                                          if($fila->jueves == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
                                          if($fila->viernes == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
                                          if($fila->sabado == "")
                                          {
                                             //si esta vacio no cuenta 
                                          }else{
                                              $contadorDiasMateria = $contadorDiasMateria + 1;
                                          }
  
                                         
                                                if($fila->lunes != "")
                                                {
                                                    $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                    if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                    {
                                                        //si existes significa que no se puede insertar 
                                                    }else{
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;                                                       
                                                    }
                                                }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }

                                            //TERMINACION DE COMPARACION
                                            if($contadorFinalMateria == $contadorDiasMateria)
                                            {
                                               // echo '<h5>'.$fila->tipo.'</h5>';
                                                if($fila->tipo == "L")
                                                {
                                                     //Si es laboratorio
                                                     if($fila->lunes == "")
                                                     {
                                                         //echo "No existe clases los lunes ";       
                                                     }else{
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoLunes == 0)
                                                         {
                                                             $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                             $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                             $HoraReffLunes = $HoraReffLunes + 1;
                                                             $brincoLunes = 1;
                                                        //echo '<br>';
                                                         }else{
                                                        //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                             $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                             $HoraReffLunes = $HoraReffLunes + 1;
                                                        //echo '<br>';
                                                         }
                                                     }
                                                     if($fila->martes == "")
                                                     {
                                                     //echo "No existe clases los lunes ";
                                                     }else{
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoMartes == 0)
                                                         {
                                                             $HoraReffMartes = substr($fila->martes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                             $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                             $HoraReffMartes = $HoraReffMartes + 1;
                                                             $brincoMartes = 1;
                                                        //echo '<br>';
                                                         }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                             $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                             $HoraReffMartes = $HoraReffMartes + 1;
                                                        //echo '<br>';
                                                         }
                                                         $HoraReffMartes = substr($fila->martes, 0, 2);
                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                         $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                         array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                         $HoraReffMartes = $HoraReffMartes + 1;
                                                    //echo '<br>';
                                                     }
                                                     if($fila->miercoles == "")
                                                     {
                                                     // echo "No existe clases los lunes ";
                                                     }else{
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoMiercoles == 0)
                                                         {
                                                             $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                             $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                             array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                             $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                             $brincoMiercoles = 1;
                                                        //echo '<br>';
     
                                                         }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                             $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                             array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                             $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                        //echo '<br>';
                                                         }
                                                     }
                                                     if($fila->jueves == "")
                                                     {
                                                     // echo "No existe clases los lunes ";
                                                     }else{
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoJueves == 0)
                                                         {
                                                             $horaDia = $HoraInicial."jueves";
                                                             $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                             $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                             array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                             $HoraReffJueves = $HoraReffJueves + 1;
                                                             $brincoJueves = 1;
                                                        //echo '<br>';
                                                         }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                             $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                             array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                             $HoraReffJueves = $HoraReffJueves + 1;
                                                        //echo '<br>';
                                                         }
                                                     }
                                                     if($fila->viernes == "")
                                                     {
                                                     //echo "No existe clases los lunes ";
                                                     }else{
                                                         
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoViernes == 0)
                                                         {
                                                             $horaDia = $HoraInicial." viernes";
                                                             $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                             $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                             $HoraReffViernes = $HoraReffViernes + 1;
                                                             $brincoViernes = 1;
                                                        //echo '<br>';
                                                         }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                             $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                             array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                             $HoraReffViernes = $HoraReffViernes + 1;
                                                        //echo '<br>';
                                                         }
                                                        
                                                     }
                                                     if($fila->sabado == "")
                                                     {
                                                     // echo "No existe clases los lunes ";
                                                     }else{
                                                         //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                         if($brincoSabado == 0)
                                                         {
                                                             $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                             $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                             array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        //echo '<br>';
                                                             $HoraReffSabado = $HoraReffSabado + 1;
                                                             $brincoSabado = 1;
                                                         }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                             $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                             array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        //echo '<br>';
                                                             $HoraReffSabado = $HoraReffSabado + 1;
                                                         }
                                                     }
                                                   
                                                }else{
                                                        //significa que si hay cupo en la hora deseada con los dias deseados
                                                    if($fila->lunes == "")
                                                    {
                                                    //echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial."lunes";
                                                        //array_push($listaDiaHoraOcupada,$horaDia);
                                                        $HoraReff = substr($fila->lunes, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReff;
                                                        $horaDiaLunes = 'lunes'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                    //echo '<br>';
                                                    }
                                                    if($fila->martes == "")
                                                    {
                                                    //echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial."martes";
                                                        $HoraReff = substr($fila->martes, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReff;
                                                        $horaDiaMartes = 'martes'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                    //echo '<br>';
                                                    }
                                                    if($fila->miercoles == "")
                                                    {
                                                    // echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial." miercoles";
                                                        $HoraReff = substr($fila->miercoles, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReff;
                                                        $horaDiaMiercoles = 'miercoles'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                    //echo '<br>';
                                                    }
                                                    if($fila->jueves == "")
                                                    {
                                                    // echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial."jueves";
                                                        $HoraReff = substr($fila->jueves, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReff;
                                                        $horaDiaJueves = 'jueves'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                    //echo '<br>';
                                                    }
                                                    if($fila->viernes == "")
                                                    {
                                                    //echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial." viernes";
                                                        $HoraReff = substr($fila->viernes, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReff;
                                                        $horaDiaViernes = 'viernes'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                    //echo '<br>';
                                                    }
                                                    if($fila->sabado == "")
                                                    {
                                                    // echo "No existe clases los lunes ";
                                                    }else{
                                                        //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                        $horaDia = $HoraInicial."sabado";
                                                        $HoraReff = substr($fila->sabado, 0, 2);
                                                    //echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReff;
                                                        $horaDiaSabado = 'sabado'.$HoraReff;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                    //echo '<br>';
                                                    }
                                                  }
                                                /*********************************************************************** */
                                            }else{
                                                //significa que hubo un empalme 
                                                if($listass->valorGrupo==1)
                                                {
                                                    //si existe pues se alerta
                                                    $error = "En la carrera: ".$lf->nombreCarrera."La materia ".$nombreM." es a la hora: ".$HoraInicial."Con el profesor ".$fila->profesor." ".'ERROR: LA MATERIA ES UNICA Y SE EMPALMA CON OTRA MATERIA CRITICA';
                                                    //echo '<br>';
                                                    //metemos el texto completo a la lista de errores
                                                    array_push($listaERRORES,$error);
                                                }else{
                                                    //si existe pues se alerta
                                                    $advertencia = "En la carrera: ".$lf->nombreCarrera."La materia ".$nombreM." es a la hora: ".$HoraInicial."Con el profesor ".$fila->profesor.'ADVERTENCIA: La hora ya esta ocupada pero tiene mas de una opcion';
                                                    //echo '<br>';
                                                    array_push($listaAdvertencias,$advertencia);
                                                }
                                            }

                                    }
                                }
                            
                        }
                    }else{
                        //se sigue no hace falta hacer nada
                    }
                }else{
                    if($fila->tipo == "L"){
                         //Se generaria una alerta critica
                        $error = "Para la carrera: ". $lf->nombreCarrera."ERROR: Revisar el documento Excel ya que no se encontro grupos para el siguiente laboratorio: ".$listass->Materia;
                        array_push($listaERRORES,$error);

                    }else{
                        //Se generaria una alerta critica
                        $error = "Para la carrera: ". $lf->nombreCarrera."ERROR: Revisar el documento Excel ya que no se encontro grupos para la siguiente materia: ".$listass->Materia;
                        array_push($listaERRORES,$error);
                    }
                }
            }
        }
        $ReporteErrores = new ObjetoAdvErro($listaERRORES);
        $ReporteAdvertencias = new ObjetoAdvErro($listaAdvertencias);
        array_push($ReporteFinal,$ReporteAdvertencias);
        array_push($ReporteFinal,$ReporteErrores);
        return $ReporteFinal;
    }


    public function MostrarErroresyAdvertencias($ReporteErroresAdvertencias)
    {
        $aux = 1;

        foreach($ReporteErroresAdvertencias as $REA)
        {
            foreach($REA as $lista)
            {
                if($aux == 1)
                {
                    echo "<h4>ADVERTENCIAS</h4>";
                    $aux = $aux + 1;
                }else{
                    echo "<h4>ERRORES</h4>";
                }
               foreach($lista as $tex)
               {
                   echo '<br>';
                   echo $tex;
               }
            }
        }
    }
/*----------------------------------------------FIN VALIDACIONES PRIMER RECORRIDO----------------------------------------------------------*/

    public function Imprime($listaFinal)
    {
       
        foreach ($listaFinal as $lf) {
            $carrera = $lf->nombreCarrera;
            uasort($lf->listaMaterias, array($this, 'sbo'));
            foreach ($lf->listaMaterias as $listass) {
               // echo $listass->Materia . '       ';
                //echo 'Valor por Grupo: ' . $listass->valorGrupo . '       ';
            }
        }
    }

    // funcion nueva de ordenamiento
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
        $valorRaw1 = $celda->getValue();

        $coordenadas = "B1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw2 = $celda->getValue();

        $coordenadas = "C1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw3 = $celda->getValue();

        $coordenadas = "D1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw4 = $celda->getValue();

        $coordenadas = "E1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw5 = $celda->getValue();

        $coordenadas = "F1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw6 = $celda->getValue();


        //revisa que las celdas coincidan para poder pasar
        if($valorRaw1 = "materia" and $valorRaw2 = "creditos" and $valorRaw3 = "profesor" and $valorRaw4 = "tipo" 
        and $valorRaw5 = "horas" and $valorRaw6 = "dias")
        {
                //echo '<h4>Entro</h4>';
                //echo 'br>';
                

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

                    //revisar que las primeras opciones de las letras sean las correctas



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
                                //echo "Entro la materia ".$nombreMateria." De tipo: ".$tipo."";
                                //echo '<br>';

                                // Inserta el objeto en el array de listaGrupos
                                array_push($listaGrupos, $Grupo);
                                $lunes = "";
                                $martes = "";
                                $miercoles = "";
                                $jueves = "";
                                $viernes = "";
                                $sabado = "";
                                $cupo = "";
                                $tipo = "";
                            }
                        }
                    }
                }
            }            
        }else{
            //No entro wacho
            //debemos alertar de alguna manera
        }
        return $listaGrupos;
    }

    //aqui de dos listas que teniamos ahora se convirtio en una sola
    //ahora en una sola lista de objetos se puede acceder a las carreras con sus propiedades
    //y a las materias por carrera con sus propiedades
    //SOLO DEL PRIMER DOCUMENTOOOOOOOOOOOOOOOOOO MPN
    public function Carreras($nombreArchivo)
    {

        //promedio


        $rutaArchivo = \public_path() . '/archivos/' . $nombreArchivo;
        $documento = IOFactory::load($rutaArchivo);

        $this->validaMPN($documento);// Regresa un reporte con errores

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
    //AQUI DEBEMOS ORDENAR MIGUEL MIGUELCAMBIOS
    public function OrdenInscripcion($listaFinal)
    {
        $listaOrdenamiento = array();

        //ordenamos los promedios
        foreach ($listaFinal as $lf) {
            //echo '<h2>'.$lf->nombreCarrera.'</h2>';
            //echo 'El promedio de la carrera:'.$lf->nombreCarrera.' es:'.$lf->PromedioCarrera;
            $aux = $lf->PromedioCarrera;
            $auxCarrera = $lf->nombreCarrera;
            //echo "La carrera: ".$auxCarrera." Tiende promedio de : ".$aux;
            //echo '<br>';
            $CarreraProm = new AuxHorario($aux,$auxCarrera);
            array_push($listaOrdenamiento,$CarreraProm);
        }

        //Antes de mandar la lista debemos ordenarla 
        $aucx = $listaOrdenamiento;;

        foreach($listaOrdenamiento as $lo)
        {
            //echo "Promedio: ". $lo->Promedio;
            //echo " Carrera: ". $lo->Carrera;
            //echo '<br>';
        }

        // Ordenar los datos con calificacion descendiente, y por carreras iguales
        // Agregar $datos como el último parámetro, para ordenar por la clave común
        //array_multisort( $calificacion, SORT_ASC ,$carrera, SORT_STRING, $aucx);

        return $aucx;//Regresa una lista ordenada

        //return $listaOrdenamiento;
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
                    //echo 'Carrera No: ' . $orden . "     ";
                    //echo $lfi->nombreCarrera . "      ";
                    //echo "   " . $lfi->PromedioCarrera;
                    $orden++;
                    //array_push($listaOrdenCarreras, $lfi->nombreCarrera);
                    //echo '<br>';
                }
            }
            break;
        }
        return $listaOrdenCarreras;
    }


    public function AsignaHoras($listaFin, $listaGru)
    {

        foreach ($listaFin as $lf) {
            echo '<h2>' . $lf->nombreCarrera . '</h2>';
            foreach ($lf->listaMaterias as $listass) {
                //echo $listass->Materia;
                //echo '<br>';
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


    public function HorariosChidos($listaFin, $listaGru,$listaPrioridad)
    {
        //lista de materias que se usara para insrtar en el objeto
        $listaMateriasInscritasHora = array();
        

        $banderaIndicador = 0;

        $Horafinal = 0;

        foreach($listaPrioridad as $lp)
        {
            //echo $lp->Carrera;
             //recorremos las carreras
                foreach ($listaFin as $lf) {
                    //echo "Carrera: ".$lf->nombreCarrera;
                    //echo '<br>';
                    //obtenemos el nombre de la carrera
                    if($lp->Carrera == $lf->nombreCarrera)
                    {
                        //Impresion del Orden
                        //cada vez que pasa por aqui significa que cambia de carrera
                        //echo "Se Crearon horarios para: ".$lp->Carrera;
                        //echo '<br>';
                        $nombrecarreraObjeto = $lf->nombreCarrera;
                        //echo  '<h4>'.$lf->nombreCarrera.'</h4>';
                        //echo '<br>';
                        for ($i = 0; $i <= 3; $i++) {
                            $ccc = $i+1;
                        // echo '<h3>Opcion Numero'.$ccc.'</h3>';
                            if ($i < 1) {
                                //echo 'entro una vez al ciclo';
                                //echo '<h2>' . $lf->nombreCarrera . '</h2>';
                                $listaMateriasInscritas = array();
                                $listaNombres = array();
                                $listaHoras = array();
    
                                //Recorrido de materias (la ordenacion por numero de grupos)
                                // ordenamiento de las materias
    
                                //baro
                                uasort($lf->listaMaterias, array($this,'sbo'));
    
    
                                foreach ($lf->listaMaterias as $materiasOrdenadas) {
    
                                    foreach ($listaGru as $lg) {
                                        
                                        //Lista de dias que se lleva la materia
                                        $listaDiasMateria = array();
                                        //se compara que si cumpla el nombre referencia con la lista de materias
                                        if ($lg->tipo != "L") //Si la materia es laboratorio se agrega al final
                                        {
                                            //Si el nombre coincide 
                                            if ($materiasOrdenadas->Materia == $lg->nombreMateria) {
                                                //revisa el tamaño de la lista de materias 
                                                $dias = $lg->dias;
                                                if (count($listaMateriasInscritas) < 0) {
                                                    
                                                    //REVISARCUPO
                                                    if($lg->cupo != 0)
                                                    {

                                                    }

                                                    //La primer materia a insertar 
                                                    //significa que la lista esta vacia
                                                    $HoraInscripcion = $lg->horas; //08
    
                                                    //Aqui es donde truje chencha
                                                    $Horafinal = substr($HoraInscripcion, 3, 2);
                                                    //echo $Horafinal;
    
                                                    $HoraInicial = substr($HoraInscripcion, 0, 2);
    
                                                    $HorasTotales = $Horafinal - $HoraInicial;
    
                                                    $prof = $lg->profesor;
    
                                                    //echo "La clase empieza a las: ".$HoraInicial." y termina a las: ".$Horafinal." Dura: ".$HorasTotales;
                                                    //echo '<br>';
    
                                                    if($HorasTotales>1)
                                                    {
                                                        //Este for nos permite insscribir materias de mas de una hora 
                                                        for($j=0; $j == $HorasTotales;$j++)
                                                        {
                                                            //echo "Entro";
                                                            //significa que el horario es de mas de una hora
                                                            //cambios miguel
                                                            array_push($listaHoras,$HoraInicial); 
                                                            $MateriaInscrita = $materiasOrdenadas->Materia;
                                                            array_push($listaNombres, $MateriaInscrita);
                                                            $prof = $lg->profesor;
                                                            //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                            $HoraInsertada = new Hora1($HoraInicial, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                            // echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                            //echo '<br>';
                                                            //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                            array_push($listaMateriasInscritas, $HoraInsertada);
                                                            sort($listaMateriasInscritas);
                                                            $HoraInicial = $HoraInicial + 1;   
                                                            
                                                            //QUITARCUPO
                                                        }
                                                        $HorasTotales = 0;
                                                    }else{
                                                        
                                                        //Significa que es de una hora a al dia 
                                                        array_push($listaHoras,   substr($HoraInscripcion, 0, 2)); //08
                                                        $MateriaInscrita = $materiasOrdenadas->Materia;
                                                        array_push($listaNombres, $MateriaInscrita);
                                                        //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                        $prof = $lg->profesor;
                                                        $HoraInsertada = new Hora1($HoraInscripcion, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                        //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                        //echo '<br>';
                                                        //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                        array_push($listaMateriasInscritas, $HoraInsertada);
                                                        sort($listaMateriasInscritas);
                                                         //QUITARCUPO
                                            
                                                        //ya no hace falta buscar en esta materia
                                                        break;
                                                    }
                                                    //si ya existe algo inscrito
                                                } else {
                                                    $nnombre = $materiasOrdenadas->Materia;
                                                    if (in_array($nnombre, $listaNombres)) {  

                                                         // si la materia ya se inserto no hace falta seguir buscando
                                                    
                                                    } else {

                                                            //REVISARCUPO
                                                            //REVISARCUPO
                                                            if($lg->cupo != 0)
                                                            {
                                                                //print_r($lg->cupo);
                                                                //echo '<br>';
                                                        
                                                            }

                                                           // Esta parte es para cuando inserta despues de la primera materia insertada

                                                        //debemos revisar que la hora este disponible
                                                        //chear que no se repitan las horas
                                                        if (in_array(substr($lg->horas, 0, 2), $listaHoras)) { // Si la hora ya esta registrada en la lista significa que esta ocupada
                                                            //entonces debemos seguir buscando en la lista
                                                        } else {
                                                            //debemos revisar que la hora este disponible
                                                               
                                                            $HoraInscripcion = $lg->horas;
                                                            //Aqui es donde truje chencha
                                                            $Horafinal = substr($HoraInscripcion, 3, 2);
                                                            //echo $Horafinal;
    
                                                            $HoraInicial = substr($HoraInscripcion, 0, 2);
    
                                                            $HorasTotales = $Horafinal - $HoraInicial;
    
                                                            //echo "La clase empieza a las: ".$HoraInicial." y termina a las: ".$Horafinal." Dura: ".$HorasTotales;
                                                            //echo '<br>';
    
                                                            if($HorasTotales>1)
                                                            {
                                                                for($j=1; $j <= $HorasTotales;$j++)
                                                                {
                                                                // echo "Entro";
                                                                    //significa que el horario es de mas de una hora
                                                                    array_push($listaHoras,$HoraInicial); 
                                                                    $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                    array_push($listaNombres, $MateriaInscrita);
                                                                    $prof = $lg->profesor;
                                                                    //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                    $prof = $lg->profesor;
                                                                    $HoraInsertada = new Hora1($HoraInicial, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                    //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                    //echo '<br>';
                                                                    //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                    array_push($listaMateriasInscritas, $HoraInsertada);
                                                                    sort($listaMateriasInscritas);
                                                                    $HoraInicial = $HoraInicial + 1;
                                                                     
                                                                    //QUITARCUPO    
                                                  
                                                                                                               
                                                                }
                                                                $HorasTotales = 0;
                                                            }else{
                                                                //cambios miguel
                                                                array_push($listaHoras,   substr($HoraInscripcion, 0, 2)); //08
                                                                $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                array_push($listaNombres, $MateriaInscrita);
                                                                $prof = $lg->profesor;
                                                                //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                $HoraInsertada = new Hora1($HoraInscripcion, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                //echo '<br>';
                                                                //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                array_push($listaMateriasInscritas, $HoraInsertada);
                                                                sort($listaMateriasInscritas);
                                                                //ya no hace falta buscar en esta materia
                                                                //echo "La materia: " . $MateriaInscrita . " Se inserto a la hora: " . substr($HoraInscripcion, 0, 2);
                                                                //  echo '<br>';
                                                                //unset($listaDiasMateria);



                                                                 //QUITARCUPO
                                       

                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            //SI ES LABORATORIO-------------------------------------------------------------------
                                        }
                                    }
                                }
                            } else {
                                //echo 'Mas opciones de horarios ';
                                //echo '<h2>' . $lf->nombreCarrera . '</h2>';
                                $listaMateriasInscritas = array();
                                $listaNombres = array();
                                $listaHoras = array();
                                uasort($lf->listaMaterias, array($this, 'sbo'));
    
                                foreach ($lf->listaMaterias as $materiasOrdenadas) {
    
                                    foreach ($listaGru as $lg) {
                                        //Lista de dias que se lleva la materia
                                        $listaDiasMateria = array();
                                        //se compara que si cumpla el nombre referencia con la lista de materias
                                        if ($lg->tipo != "L") //Si la materia es laboratorio se agrega al final
                                        {
                                            if ($materiasOrdenadas->Materia == $lg->nombreMateria) {

                                                //REVISARCUPO

                                                //revisa el tamaño de la lista de materias 
                                                $dias = $lg->dias;
                                                if (count($listaMateriasInscritas) < 0) {
    
                                                    foreach ($lf->listaMaterias as $listass) {
    
                                                        if ($listass->Materia == $lg->nombreMateria) {
                                                            $numeroMagico = $listass->valorGrupo;
                                                            //echo $numeroMagico;    
                                                        }
                                                    }
    
                                                    if ($numeroMagico > 3) {
                                                        //si es mayor a 3 se va a swichear
                                                            foreach ($listaMateriasInscritasHora as $lli) {
                                                                foreach ($lli->listaDia as $otro) {
                                                                    $banderaIndicador = 0;
                                                                    if ($otro->carr == $lf->nombreCarrera) {
                                                                        //si es de la misma carrera
                                                                        if ($otro->campo == $lg->nombreMateria) {
                                                                            //tiene que verificar de la carrera
                                                                            $dasd = $otro->hora;
                                                                            $hu = substr($dasd, 0, 2);
                                                                            $jei = strval($hu);
                                                                            $jelou = substr($lg->horas, 0, 2);
                                                                            $bye = strval($jelou);
                                                                            if ($jei == $bye) {
        
                                                                                $banderaIndicador = 1;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            if ($banderaIndicador == 1) {
                                                                //significa que no va a insertar ese
                                                                $banderaIndicador = 0;
                                                            } else {
                                                                    //echo "entro";
                                                                    //significa que la lista esta vacia
                                                                    $HoraInscripcion = $lg->horas; //08
                
                                                                    //Aqui es donde truje chencha
                                                                    $Horafinal = substr($HoraInscripcion, 3, 2);
                                                                    //echo $Horafinal;
                
                                                                    $HoraInicial = substr($HoraInscripcion, 0, 2);
                
                                                                    $HorasTotales = $Horafinal - $HoraInicial;
                
                                                                    //echo "La clase empieza a las: ".$HoraInicial." y termina a las: ".$Horafinal." Dura: ".$HorasTotales;
                                                                    //echo '<br>';
                                                                    if($HorasTotales>1)
                                                                    {
                                                                        for($j=0; $j == $HorasTotales;$j++)
                                                                        {
                                                                            //echo 'Entro';
                                                                            //significa que el horario es de mas de una hora
                                                                            //cambios miguel
                                                                            array_push($listaHoras,$HoraInicial); 
                                                                            $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                            array_push($listaNombres, $MateriaInscrita);
                                                                            //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                            $prof = $lg->profesor;
                                                                            $HoraInsertada = new Hora1($HoraInicial, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                            //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                            //echo '<br>';
                                                                            //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                            array_push($listaMateriasInscritas, $HoraInsertada);
                                                                            sort($listaMateriasInscritas);
                                                                            $HoraInicial = $HoraInicial + 1;  
                                                                             //QUITARCUPO   
                                                                                                                       
                                                                        }
                                                                        $HorasTotales = 0;
                                                                    }else{
                                                                        //cambios miguel
                                                                        array_push($listaHoras,   substr($HoraInscripcion, 0, 2)); //08
                                                                        $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                        array_push($listaNombres, $MateriaInscrita);
                                                                        //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                        $prof = $lg->profesor;
                                                                        $HoraInsertada = new Hora1($HoraInscripcion, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                        //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                        //echo '<br>';
                                                                        //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                        array_push($listaMateriasInscritas, $HoraInsertada);
                                                                        sort($listaMateriasInscritas);
                                                                        //ya no hace falta buscar en esta materia
                                                                        //echo "La materia: " . $MateriaInscrita . " Se inserto a la hora: " . substr($HoraInscripcion, 0, 2);
                                                                        //  echo '<br>';
                                                                        //unset($listaDiasMateria);
                                                                         //QUITARCUPO
                                                   
                                                                        break;
                                                                    }
                                                
                                                    }
                                                } else {   
                                                    //osea que ya existe algo
                                                    foreach ($listaMateriasInscritasHora as $lli) {
                                                        foreach ($lli->listaDia as $otro) {
                                                            if ($otro->carr == $lf->nombreCarrera) {
                                                                //si es de la misma carrera
                                                                if ($otro->campo == $lg->nombreMateria) {
                                                                    if ($lf->nombreCarrera == $otro->carr) {
                                                                        foreach ($lf->listaMaterias as $listass) {
    
                                                                            if ($listass->Materia == $otro->campo) {
                                                                                $numeroMagico = $listass->valorGrupo;
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                    if ($numeroMagico > 3) {
                                                                        //tiene que verificar de la carrera
                                                                        $dasd = $otro->hora;
                                                                        $hu = substr($dasd, 0, 2);
                                                                        $jei = strval($hu);
                                                                        $jelou = substr($lg->horas, 0, 2);
                                                                        $bye = strval($jelou);
                                                                        if ($jei == $bye) {
                                                                            $banderaIndicador = 1;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
    
                                                    if ($banderaIndicador == 1) {
                                                        $banderaIndicador = 0;
                                                    } else {
                                                        //echo "entro";
                                                        $nnombre = $materiasOrdenadas->Materia;
                                                        if (in_array($nnombre, $listaNombres)) {   // si la materia ya se inserto no hace falta seguir buscando
                                                            //echo "Existe Irix";
                                                        } else {

                                                           //REVISARCUPO

                                                            //debemos revisar que la hora este disponible
                                                            //chear que no se repitan las horas
                                                            if (in_array(substr($lg->horas, 0, 2), $listaHoras)) { // Si la hora ya esta registrada en la lista significa que esta ocupada
                                                                //entonces debemos seguir buscando en la lista
                                                            } else {
                                                                //debemos revisar que la hora este disponible
                                                                //significa que la lista esta vacia
                                                                 $HoraInscripcion = $lg->horas;
    
                                                                        //Aqui es donde truje chencha
                                                                $Horafinal = substr($HoraInscripcion, 3, 2);
                                                                //echo $Horafinal;
    
                                                                $HoraInicial = substr($HoraInscripcion, 0, 2);
    
                                                                $HorasTotales = $Horafinal - $HoraInicial;
    
                                                                //echo "La clase empieza a las: ".$HoraInicial." y termina a las: ".$Horafinal." Dura: ".$HorasTotales;
                                                                //echo '<br>';
    
                                                                if($HorasTotales>1)
                                                                {
                                                                    for($j=0; $j == $HorasTotales;$j++)
                                                                    {
                                                                        //echo "entro";
                                                                        //significa que el horario es de mas de una hora
                                                                        //cambios miguel
                                                                        array_push($listaHoras,$HoraInicial); 
                                                                        $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                        array_push($listaNombres, $MateriaInscrita);
                                                                        $prof = $lg->profesor;
                                                                        //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                        $HoraInsertada = new Hora1($HoraInicial, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                        //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                        //echo '<br>';
                                                                        //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                        array_push($listaMateriasInscritas, $HoraInsertada);
                                                                        sort($listaMateriasInscritas);
                                                                        $HoraInicial = $HoraInicial + 1;
                                                                         //QUITARCUPO  
                                                                                                           
                                                                    }
                                                                    $HorasTotales = 0;
                                                                }else{
                                                                    //cambios miguel
                                                                    array_push($listaHoras,   substr($HoraInscripcion, 0, 2)); //08
                                                                    $MateriaInscrita = $materiasOrdenadas->Materia;
                                                                    array_push($listaNombres, $MateriaInscrita);
                                                                    $prof = $lg->profesor;
                                                                    //creamos el objeto Hora y ponemos sus dos propiedades que rcordemos es la hora y nombre de la materia
                                                                    $HoraInsertada = new Hora1($HoraInscripcion, $MateriaInscrita, $lf->nombreCarrera, $lg->dias,$prof);
                                                                    //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                                                    //echo '<br>';
                                                                    //En esta lista guardamos 2 cosas "Hora de la materia" y "Nombre de la materia" pero como un objeto
                                                                    array_push($listaMateriasInscritas, $HoraInsertada);
                                                                    sort($listaMateriasInscritas);
                                                                    //ya no hace falta buscar en esta materia
                                                                    //echo "La materia: " . $MateriaInscrita . " Se inserto a la hora: " . substr($HoraInscripcion, 0, 2);
                                                                    //  echo '<br>';
                                                                    //unset($listaDiasMateria);
                                                                     //QUITARCUPO
                                                                     
                                     
                                                                    break;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
    
                            $auxlistas = array();
                            $auxdias = array();
                            $listaAMandar = array("");
                            $diasAux = "";
                            foreach($listaMateriasInscritas as $lismat)
                            {
                                $numeroAux = $lismat->hora;
                                $diasAux = $lismat->dias;
                                array_push($auxdias,$diasAux);
                                array_push($auxlistas,substr($numeroAux, 0, 2)); 
                            }
    
                            foreach($auxlistas as $al)
                            {
                                foreach($listaMateriasInscritas as $lmi)
                                {
                                    $horaAux =  substr($lmi->hora, 0, 2);
                                    if($al == $horaAux)
                                    {
                                    // echo 'La materia: '.$lmi->campo.' Inscrita a: '.$lmi->hora.' de la carrera: '.$lmi->carr.' Los dias: '.$lmi->dias;
                                    // echo '<br>';
                                        $prof = $lg->profesor;
                                        $HoraInsertada = new Hora1($lmi->hora, $lmi->campo, $lmi->carr,$lmi->dias,$prof);
                                        //echo "Materia: ".$MateriaInscrita." Profesor: ".$prof." Hora: ".$HoraInicial;
                                        //echo '<br>';
                                        array_push($listaAMandar,$HoraInsertada);
                                        $referencia = 1;                    
                                    }
                                }
                            }
                            //referenciahorarios
                            $HF = new HorarioFinal($i, $listaMateriasInscritas);
                            array_push($listaMateriasInscritasHora, $HF);
                        }
                    
                    }
                }
           
        }
        //lo usare para revisar la lista
        return $listaMateriasInscritasHora;
    }


    public function ValorHorarios($listaHorarios)
    {
        foreach ($listaHorarios as $lli) {
            echo "Horario Numero:" . $lli->numeroHorario;
            echo '<br>';
            echo '<br>';
            sort($lli->listaDia);
            $aux = 1;
            foreach ($lli->listaDia as $otro) {
                $r = count($lli->listaDia);
                if ($aux == 1) {
                    $PimeraHora = $otro->hora;
                    $Paris = substr($PimeraHora, 0, 2);
                    echo "Hora Entrada :" . $Paris;
                    echo '<br>';
                }

                echo $otro->hora . " ";

                echo $otro->campo . " ";

                echo $otro->carr . " ";
                echo '<br>';

                if ($aux == $r) {
                    $ultimaHora = $otro->hora;
                    $berlin = substr($ultimaHora, 3, 2);
                    echo "Hora Salido :" . $berlin;
                    echo '<br>';
                    echo "Total de clases: " . $r;
                    echo '<br>';
                    $numerouno = intval($berlin);
                    $numerodos = intval($Paris);
                    $resultado = $numerouno - $numerodos;
                    echo "Horas en la universidad: " . $resultado;
                    echo '<br>';
                    $Palermo = intval($r);
                    $horasLibres = $resultado - $Palermo;
                    echo "Las horas libres en este horario son de: " . $horasLibres;
                    echo '<br>';
                }
                $aux = $aux + 1;
            }
            
        }
    }



        //Fucion que nos ayuda a leer y guardar informacion DEL SEGUNDO DOCUMENTO NOS DA TODA LA INFORMACION
    public function DocumentoAlumnos($nombreArchivo)
    {
        $rutaArchivo = \public_path() . '/archivos/' . $nombreArchivo;
        $documento = IOFactory::load($rutaArchivo);

        # obtenemos la primera celda para la validacion del archivo CPM
        $coordenadas = "A1";
        $hojaActual = $documento->getSheet(0);
        $celda = $hojaActual->getCell($coordenadas);
        $valorRaw = $celda->getValue();

        $ClaveAlumno = "";
        $NombreAlumno = "";
        $CalificacionAlumno = 0;
        $CarreraAlumno = "";


        // Sin comillas para objetos
        $listaAlumnos = array();

        //Recorrido de celdas
        foreach ($hojaActual->getRowIterator() as $fila) {
            foreach ($fila->getCellIterator() as $celdaPrueba) {

                # El valor, así como está en el documento
                $valorRaw = $celdaPrueba->getValue();
                # Fila, que comienza en 1, luego 2 y así...
                $fila = $celdaPrueba->getRow();
                # Columna, que es la A, B, C y así...
                $columna = $celdaPrueba->getColumn();


                

                if($valorRaw != "")
                {
                    if ($columna == "A") {
                        if ($valorRaw != "Clave") {
                            $ClaveAlumno = $valorRaw;
                            //echo $ClaveAlumno;
                            //strval($ClaveAlumno);
                        }
                    }
                    if ($columna == "B") {
                        if ($valorRaw != "Nombre_Alumno") {
                            $NombreAlumno = $valorRaw;
                            //echo $NombreAlumno;
                        }
                    }
                    if ($columna == "C") {
                        if ($valorRaw != "calif") {
                            $CalificacionAlumno = $valorRaw;
                            //echo $CalificacionAlumno;
                        }
                    }
                    if ($columna == "D") {
                        if ($valorRaw != "Carrera") {
                            $CarreraAlumno = $valorRaw;
                           // echo $CarreraAlumno;
                            //echo '<br>';
                            $ObjetoAlumno = new Alumno($ClaveAlumno,$NombreAlumno,$CalificacionAlumno,$CarreraAlumno);
                            array_push($listaAlumnos,$ObjetoAlumno);
                        }
                    }
                }
            }
        }



        //regresamos una lista qcon la informacion que queremos
        return $listaAlumnos;
    }


    public function recorreLista($listaAlumnos)
    {
        foreach($listaAlumnos as $la)
        {
           echo $la->ClaveAlumno;
        }
    }

    //PROXIMO
    public function AsigaHorarios($listaHorarios,$listaAlumnosFinal,$listaFinal)
    {
        //listaHorarios nos dara (Numero de horario, carrera, ...)
        //listaAlumnos nos dara (clave,nombre,calificacion, carrera)
        //listaFinal ->Solo la usare para recorrer por carrera 

        //Este nos ayudara a saber cuantos alumnos ya tienen horario y sera nuestro margen de cambio
        $numeroHorariosRepartidos = 0;

        $numeroHorarioActual = 1;

        $numeroTotaldeHorarios = 0;

        $ciclo = 1;

        //lista de alumnos inscritos
        $listaAlumnosIn = array();

        foreach($listaAlumnosFinal as $l)
        {
            if($ciclo == 1)
            {
                $AuxCarrera = $l->CarreraAlumno;
                $ciclo = $ciclo + 1;
            break;
            }
        }


        foreach($listaFinal as $lf)
        {
            $numeroHorarioActual = 1;
            $numeroHorariosRepartidos = 0;
            foreach($listaAlumnosFinal as $laf)
            {
                if($lf->nombreCarrera == $laf->CarreraAlumno)
                {
                   // echo '<h3>Carrera: </h3>'.$lf->nombreCarrera;
                    //revisamos cuantos horarios se han repartido

                    //cambiar a la otra forma de algoritmo
                    //revision22/06
                    if($numeroHorariosRepartidos < 2)
                    {
            
                    
                        //osea que si 20 alumnos ya se inscribieron en el mismo horario es hora de pasar a la siguiente opcion de horario bloque 
                        //aqui se le asignaria a una nueva clase o algo asi

                        //Este foreach solo es para saber cuantos horarios tiene cada carrera 
                        foreach($listaHorarios as $lh)
                        { 
                            if($aux = $lh->listaDia[0]->carr == $lf->nombreCarrera)
                            {
                                $numeroTotaldeHorarios = $numeroTotaldeHorarios + 1;
                            }
                        }

                        //se asigna $numeroHorarioActual a algo
                        //Se le suma a numeroHorariosRepartidos
                        $Cve = $laf->ClaveAlumno;
                        $Nom = $laf->NombreAlumno;
                        $Cal = $laf->CalificacionAlumno;
                        $Car = $laf->CarreraAlumno;
                        $AsignacionCompletada = new AlumnoInscrito($Cve,$Nom,$Cal,$Car,$numeroHorarioActual);
                        //echo 'Se asigno el Horario No. '.$numeroHorarioActual.'a el alumno/a'.$Nom.'De la carrera: '.$Car;
                        //echo '<br>';
                        //MIGUEL21
                        array_push($listaAlumnosIn,$AsignacionCompletada);
                        $numeroHorariosRepartidos = $numeroHorariosRepartidos + 1;
                    }else{
                        //osea que si 20 alumnos ya se inscribieron en el mismo horario es hora de pasar a la siguiente opcion de horario bloque 
                        //aqui se le asignaria a una nueva clase o algo asi

                        //Este foreach solo es para saber cuantos horarios tiene cada carrera 
                        foreach($listaHorarios as $lh)
                        { 
                            if($aux = $lh->listaDia[0]->carr == $lf->nombreCarrera)
                            {
                                $numeroTotaldeHorarios = $numeroTotaldeHorarios + 1;
                            }
                        }

                        //se asigna $numeroHorarioActual a algo
                        //Se le suma a numeroHorariosRepartidos
                        $Cve = $laf->ClaveAlumno;
                        $Nom = $laf->NombreAlumno;
                        $Cal = $laf->CalificacionAlumno;
                        $Car = $laf->CarreraAlumno;
                        $AsignacionCompletada = new AlumnoInscrito($Cve,$Nom,$Cal,$Car,$numeroHorarioActual);
                        //echo 'Se asigno el Horario No. '.$numeroHorarioActual.'a el alumno/a'.$Nom.'De la carrera: '.$Car;
                        //echo '<br>';
                        //MIGUEL21
                        array_push($listaAlumnosIn,$AsignacionCompletada);
                        //aqui cambias de horario al siguiente
                        $numeroHorarioActual = $numeroHorarioActual + 1;
                        //reinicias la cuenta 
                        $numeroHorariosRepartidos = 0;
                    }
                }
            }
        }
        return $listaAlumnosIn;
    }

    //MIGUEL21
    public function imprimeAsignacion($listaAsignacionHorarios)
    {   

        foreach ($listaAsignacionHorarios as $key => $val) {
            
            echo "Clave: ".$val->ClaveAlumno." ";
            echo "Alumno: ".$val->NombreAlumno." ";
            echo "Calificacion: ".$val->CalificacionAlumno." ";
            echo "Carrera: ".$val->CarreraAlumno." ";
            echo "Alumno: ".$val->NumeroHorarioAsignado." ";
            echo '<br>';
            
        }      
    }

    public function ordenachingon($listaAsignacionHorarios)// ordena arreglos bidimensionales
    {  
        $aucx = $listaAsignacionHorarios;;

        // Obtener una lista de columnas
        foreach ($aucx as $clave => $fila) {
            $carrera[$clave] = $fila->CarreraAlumno;
            $calificacion[$clave] = $fila->CalificacionAlumno;
        }

        // Ordenar los datos con calificacion descendiente, y por carreras iguales
        // Agregar $datos como el último parámetro, para ordenar por la clave común
        array_multisort( $carrera, SORT_STRING,$calificacion, SORT_DESC, $aucx);

        return $aucx;//Regresa una lista ordenada

    }

    public function ObtenAlumnosxCarrera($listaAsignacionAlumnos)
    {
        $cantidadAlumnos = array();
        // Obtener una lista de carreras
        foreach ($listaAsignacionAlumnos as $clave => $fila) {
            $carrera[$clave] = $fila->CarreraAlumno;
        }
        $carrera = array_unique($carrera);//filtramos para que no se repitan

        foreach($carrera as $c)
        {
            $cont = 0;
            foreach($listaAsignacionAlumnos as $clave => $fila) {

                if($c ==$fila->CarreraAlumno)
                {

                    $cont = $cont+1;
                }
            }
            $cantidadAlumnos[$c]=$cont;
        }
        
        return $cantidadAlumnos;
    }

    public function CalculaNumeroHbloques($axc,$listaGrupos,$listaFinal)//axc = alumnos aceptados por carrera
    {
        // Obtener una lista de columnas
        foreach ($listaGrupos as $clave => $fila) {
            $nombreM[$clave] = $fila->nombreMateria;
            $cupo[$clave] = $fila->cupo;
        }

        // Ordenar los datos con calificacion descendiente, y por carreras iguales
        // Agregar $datos como el último parámetro, para ordenar por la clave común
        array_multisort( $nombreM, SORT_STRING,$cupo, SORT_ASC, $listaGrupos);
        $nombreM = array_unique($nombreM);//filtramos para que no se repitan
        $minimosxMateria = array();
        foreach($nombreM as $nom)//Obtenemos el cupo minimo por materia
        {
            foreach($listaGrupos  as $clave => $fila)
            {
                if($nom == $fila->nombreMateria)
                {
                    $minimosxMateria[$nom] = $fila->cupo;//array con materia y menor cupo
                    break;
                }
            }
        }

        $MinimoxMateria = array();
        $auxi = array();
        $MinimoxMateriayCarrera = array();

        foreach ($listaFinal as $lf) {
            foreach ($lf->listaMaterias as $listass) {
                //ahi accedemos a cada materia de cada carrera
                $MinimoxMateria['Materia'] = $listass->Materia;
                $MinimoxMateria['cupo'] = $this->ObtenMinimoCupo($minimosxMateria, $listass->Materia);                
                array_push($auxi,$MinimoxMateria);
            }
            $MinimoxMateriayCarrera[$lf->nombreCarrera] = $auxi;
        }

         /*//Imprime los cupos
        foreach($MinimoxMateriayCarrera as $k => $v)
        {
            print_r($k);
            echo '********** <br>';
            foreach($v as $kk => $vv )
            {
                echo "*Materia*  ";
                print_r($vv['Materia']);
                echo "           *Cupo Minimo*  ";
                print_r($vv['cupo']);
                echo '<br>';     
            }
            echo '<br>';
        }
        */
    }

    public function ObtenMinimoCupo($minimoscupos, $nombMateria)
    {
        $cupo = 9999;//Si no encuentra la materia pondra un cupo muy alto
        if (array_key_exists($nombMateria, $minimoscupos)) {// verifica si existe el nombre de la materia en el array 
            $cupo =$minimoscupos[$nombMateria];//Obtiene el numero del cupo
        }
        return $cupo;
    }

    public function validaMPN($document)
    {
        //Habro la hoja 1 del archivo
        $document->setActiveSheetIndex(0);
        //Convierto los datos de la Hoja en un arreglo
        $dataExcel = $document->getActiveSheet()->toArray();
        
        //Me posiciono en la celda donde empiezen los datos
        $ObjHoja = $document->getSheet(0);
        $persons = array();
        $errors = array();
        if($ObjHoja != NULL)
        {
            $rows = count($dataExcel);
            //Arreglos para guardar los errores
            for($cell = 1; $cell <= $rows ; $cell++){
                
                $celdaA = $document->getActiveSheet()->getCell('A'.$cell)->getValue();
                $celdaB = $document->getActiveSheet()->getCell('B'.$cell)->getValue();
                $celdaC = $document->getActiveSheet()->getCell('C'.$cell)->getValue();
                $celdaD = $document->getActiveSheet()->getCell('D'.$cell)->getValue();

                if($cell == 1)
                {
                    if($celdaA != "cve_carrera" || $celdaB != "carrera"|| $celdaC != "cve_materia" || $celdaD != "materia" )
                    {
                        $errors[] = array('cabecera' => "Error en las cabeceras del archivo");
                    }

                }
                elseif($celdaA == "" && $celdaB  == "" && $celdaC == "" && $celdaD == "")
                {
                    //Termino el archivo
                }
                else{
                    
                //Recupero las filas del excel
                $persons[$cell]['cve_carrera'] = $celdaA;
                $persons[$cell]['carrera'] = $celdaB;
                $persons[$cell]['cve_materia'] = $celdaC;
                $persons[$cell]['materia']= $celdaD;

                if($persons[$cell]['cve_carrera'] === NULL){
                   $errors[] = array('cve_carrera' => "Error en la Fila ".$cell." No hay ninguna clave");
                }
                elseif (!is_numeric($persons[$cell]['cve_carrera'])) {
                    $errors[] = array('cve_carrera' => "Error en la Fila ".$cell." La clave ".$persons[$cell]['cve_carrera']." es invalida");
                }

                if ($persons[$cell]['carrera'] === NULL) {
                    $errors[] = array('carrera' => "Error en la Fila ".$cell." No hay ninguna carrera");
                }
                elseif (!is_string($persons[$cell]['carrera'])) {
                    $errors[] = array('carrera' => "Error en la Fila ".$cell." La carrera ".$persons[$cell]['carrera']." es invalida");
                }

                if ($persons[$cell]['cve_materia'] === NULL) {
                    $errors[] = array('cve_materia' => "Error en la Fila ".$cell." No hay ninguna clave");
                }elseif (!is_numeric($persons[$cell]['cve_materia'])) {
                    $errors[] = array('cve_materia' => "Error en la Fila ".$cell." La clave ".$persons[$cell]['cve_materia']." es invalida");
                }

                if ($persons[$cell]['materia'] === NULL) {
                    $errors[] = array('materia' => "Error en la Fila ".$cell." No hay ninguna materia");
                }elseif (!is_string($persons[$cell]['materia'])) {
                    $errors[] = array('materia' => "Error en la Fila ".$cell." La materia ".$persons[$cell]['materia']." es invalida");
                }
                }
            }
        }else{
            $errors[] = array('No valido' => "Error el archivo esta vacio");
        }

        //return $errors;//Regresa un array con los errores encontrados en el archivo
        //PODRIAMOS VER Y SI ESTE ARRAY ESTA VACIO CONTINUAR
        // SINO SOLICITAR QUE SE VUELVAN A CARGAR LOS ARCHIVOS
        
    }



    public function HorasOcio($listaHorariosFinal)
    {
        $Hocio = array();
        $arrAux = $this->arrDias();
        foreach($listaHorariosFinal as $obj)
        {
            foreach($obj->listaDia as $dia)
            {
                $HocioxHora = array();
                $carrera = $dia->carr;
                $libxSem = "true"; //Bandera para saber es hora libre x semana

                if (strpos($dia->dias, 'L') !== false) {
                    $i = 0;
                    $valAnt = $arrAux[$i]['ocio'];//Guardamos el valor de ocio anterior a la evaluacion
                    $arrAux = $this->ObtenHoraOcio( $i , $arrAux,$dia );
                    $valDesp = $arrAux[$i]['ocio'];//Guardamos el valor de ocio posterior a la evaluacion
                    if($arrAux[$i]['ocio'] > $valAnt)//Si hay diferencia hubo hora ocio
                    {                        
                        $resta = $arrAux[$i]['ocio'] - $valAnt;
                        array_push($HocioxHora,   $resta);//guardamos la diferencia
                    }
                    else
                    {
                        $libxSem = "false";
                    }
                }
                if (strpos($dia->dias, 'Ma') !== false) {
                    $i = 1;
                    $valAnt = $arrAux[$i]['ocio'];//Guardamos el valor de ocio anterior a la evaluacion
                    $arrAux = $this->ObtenHoraOcio( $i , $arrAux,$dia );
                    $valDesp = $arrAux[$i]['ocio'];//Guardamos el valor de ocio posterior a la evaluacion
                    if($arrAux[$i]['ocio'] > $valAnt)//Si hay diferencia hubo hora ocio
                    {
                        $resta = $arrAux[$i]['ocio'] - $valAnt;
                        array_push($HocioxHora,   $resta);//guardamos la diferencia
                    }
                    else
                    {
                        $libxSem = "false";
                    }
                }
                if (strpos($dia->dias, 'Mi') !== false) {
                    $i = 2;
                    $valAnt = $arrAux[$i]['ocio'];//Guardamos el valor de ocio anterior a la evaluacion
                    $arrAux = $this->ObtenHoraOcio( $i , $arrAux,$dia );
                    $valDesp = $arrAux[$i]['ocio'];//Guardamos el valor de ocio posterior a la evaluacion
                    if($arrAux[$i]['ocio'] > $valAnt)//Si hay diferencia hubo hora ocio
                    {
                        $resta = $arrAux[$i]['ocio'] - $valAnt;
                        array_push($HocioxHora,   $resta);//guardamos la diferencia
                    }
                    else
                    {
                        $libxSem = "false";
                    }
                }
                if (strpos($dia->dias, 'J') !== false) {
                    $i = 3;
                    $valAnt = $arrAux[$i]['ocio'];//Guardamos el valor de ocio anterior a la evaluacion
                    $arrAux = $this->ObtenHoraOcio( $i , $arrAux,$dia );
                    $valDesp = $arrAux[$i]['ocio'];//Guardamos el valor de ocio posterior a la evaluacion
                    if($arrAux[$i]['ocio'] > $valAnt)//Si hay diferencia hubo hora ocio
                    {
                        $resta = $arrAux[$i]['ocio'] - $valAnt;
                        array_push($HocioxHora,   $resta);//guardamos la diferencia
                    }
                    else
                    {
                        $libxSem = "false";
                    }
                }
                if (strpos($dia->dias, 'V') !== false) {
                    $i = 4;
                    $valAnt = $arrAux[$i]['ocio'];//Guardamos el valor de ocio anterior a la evaluacion
                    $arrAux = $this->ObtenHoraOcio( $i , $arrAux,$dia );
                    $valDesp = $arrAux[$i]['ocio'];//Guardamos el valor de ocio posterior a la evaluacion
                    if($arrAux[$i]['ocio'] > $valAnt)//Si hay diferencia hubo hora ocio
                    {
                        $resta = $arrAux[$i]['ocio'] - $valAnt;
                        array_push($HocioxHora,   $resta);//guardamos la diferencia
                    }
                    else
                    {
                        $libxSem = "false";
                    }
                }

                

                if($libxSem === "true")//Significa que hubo hora libre toda la semana
                {
                    if($HocioxHora != null && count($HocioxHora) >= 5)
                        $arrAux = $this->CalculaOcio($HocioxHora, $arrAux);
                }

                if (strpos($dia->dias, 'S') !== false) {
                    $arrAux = $this->ObtenHoraOcio( 5 , $arrAux,$dia );
                }

                

            }
            $tot = $arrAux[0]['ocio'] +$arrAux[1]['ocio'] +$arrAux[2]['ocio'] +$arrAux[3]['ocio'] +$arrAux[4]['ocio'] +$arrAux[5]['ocio']+$arrAux[0]['total'];
            $pordia = new HoraLibres($obj->numeroHorario, $carrera, $arrAux, $tot); // arrAux = horas libres por dia, tot = total de horas libres por horario
            $arrAux = $this->arrDias();
            
            array_push($Hocio,$pordia);
        }
        //print_r("***************************************Final********************************");
        //echo "<br>";
        foreach($Hocio as $h)
        {
            echo "Horario:  ";
            print_r($h->numHorario);
            echo "       Carrera: ";
            print_r($h->carrera);
            echo "        Horas Ocio Totales:  ";
            
            //Algoritmo descomposicion
            $numeros = str_split($h->ocioTotal);
            while(count($numeros) < 3){
                array_unshift($numeros,0);
            };
            //$numero[0], $numero[1],$numero[3]


            print_r($numeros);
            //print_r($h->ocioTotal);
            //echo "<br>";
            foreach($h->listOscio as $key => $val) // Horas ocio por dia, cda vuelta del ciclo imprime las horas libres de ese dia ej: lunes  , martes..
            {
                //echo "    Por dia:   ";
                //print_r($val['ocio']);


                //Algoritmo descomposicion
                $numeros = str_split($val['ocio']);
                while(count($numeros) < 2){
                array_unshift($numeros,0);
                };
                //$numero[0], $numero[1]

                //print_r($numeros);
                //echo "<br>";
            }
        }

        
        return $Hocio;
    }

    public function arrDias()
    {
        $dias = array();
        for ($i = 1; $i <= 6; $i++)//Crea 5 arreglos para los dias 0 = lunes 1 = martes etc
        {
            $array = array(
                "inicio"    => "false",
                "Hanterio"  => 0,
                "ocio"  => 0,
                "total"  => 0,
            );
            array_push($dias,$array);
        }
        return $dias;
    }

    public function ObtenHoraOcio( $i, $arrAux,$dia )
    {
        if($arrAux[$i]['inicio'] === "true")//verifica si ya comenzaron las clases
        {
            if( $arrAux[$i]['Hanterio'] !== substr($dia->hora, 0,2)  )//Detectamos hora ocio
            {
                $dif = (substr($dia->hora, 0,2)-$arrAux[$i]['Hanterio'] ); //Detectamos si hay horas libres seguidas
                if($dif > 1)//si hay mas de una hora libre
                {
                    $arrAux[$i]['ocio'] =  $arrAux[$i]['ocio'] + (10 * $dif);// mas 10 por cada hora libre seguida
                }
                else//solo hay una hora libre seguida
                {
                    $arrAux[$i]['ocio'] =  $arrAux[$i]['ocio'] + $dif ;//Aumentamos el contador de ocio + 1 por hora libre
                }
            }
            $arrAux[$i]['Hanterio'] = substr($dia->hora, -2); 
        }
        else
        {
            $arrAux[$i]['inicio'] = "true";
            $arrAux[$i]['Hanterio'] = substr($dia->hora, -2); 
        }

        return $arrAux;
    }

    public function CalculaOcio($HocioxHora , $arrAux)
    {
        $NumMen = min($HocioxHora);//Obtenemos el dato menor del arreglo

        if($NumMen <= 10)
        {
            for($i = 0; $i<=4; $i++)
            {
                if($HocioxHora[$i] < 10)
                {
                    $arrAux[$i]['ocio'] = $HocioxHora[$i] -$NumMen; //0
                }
                else
                {
                    $res =  $HocioxHora[$i] - ($NumMen * 10);
                    if($res <= 10)
                    {
                        $arrAux[$i]['ocio'] =   1;
                    }
                    else
                    {
                        $arrAux[$i]['ocio'] =  $arrAux[$i]['ocio'] - ($NumMen * 10);
                    }
                }
            }
        }
        else
        {
            for($i = 0; $i<=4; $i++)
            {
                //$res =  $HocioxHora[$i] - ($NumMen * 10);
                $res =  $HocioxHora[$i] - ($NumMen * 10);
                if($res <= 10)
                {
                    $arrAux[$i]['ocio'] =   1;
                }
                else
                {
                    $arrAux[$i]['ocio'] =  $arrAux[$i]['ocio'] - ($NumMen * 10);
                }
            }
        }
        if($NumMen <= 10)
        {
            $arrAux[0]['total'] = $NumMen*100;
        }
        else
        {
            $arrAux[0]['total'] = $NumMen*10;
        }
        
        return $arrAux;
    }

/*CREACION DE LOS HORARIOS PRECISOS------------------------------------------------------------------------------------------------------------------*/
    public function GenerarHorariosBloque($listaFinal,$listaGrupos,$listaPrioridad)
    {
        //
        $listaDeHorariosFinal = array();
        $listaMateriasInscritasHora = array();
        $listaAdvertencias = array("");
        $listaERRORES = array("");
        $ReporteFinal = array();
        //foreach para recorrer carrera por carrera
        foreach ($listaFinal as $lf) {

            $listaDeHorariosFinal = array();

            //
            $listaAuxiliarHorarios = array();

            for($r=0; $r<4; $r++)
            {
                if($r>0)
                {
                    sort($listaMateriasHorario);
                    array_push($listaAuxiliarHorarios,$listaMateriasHorario);
                    foreach($listaAuxiliarHorarios as $lh)
                    {
                        foreach($lh as $recorrido)
                        {
                            //echo $recorrido->campo;
                            //echo $recorrido->hora;
                            //echo '<br>';
                        }
                    }
                }
                $listaMateriasInscritasNombre = array();
                $listaMateriasAñadidas = array();
                if($r == 0)
                {
                    echo '<h4>'.$r.'</h4>';
                    //guardamos el nombre de la carrera
                    $carrera = $lf->nombreCarrera;
                    echo '<h5>'.$carrera.'</h5>';
                    //lista donde se va a guardar las horas de la carrera
                    $listaHorasOcupada = array();
                    //lista de Hora y Dia ocupada
                    $listaDiaHoraOcupado = array("");
                    //acomodamos la lista
                    uasort($lf->listaMaterias, array($this, 'sbo'));
                    //lista que nos dira que materias YA estan insertadas
                    
                    //foreach para recorrer las materias de la carrera con la informacion

                    //NUMERO DE HORARIO A REALIZAR
                    $NumeroReferenciaHorario = 1;

                    $listaMateriasHorario = array();

                                
                    foreach ($lf->listaMaterias as $listass) {

                        $contadorDiasMateria = 0;
                        $contadorFinalMateria = 0;

                        foreach ($listaGrupos as $clave => $fila) {

                            //guardamos la variable que vamos a comparar esta variable es la que se esta recorriendo del archivo
                            //Comparamos si la materia con pocos grupos es igual al recorrido dentro del archivo 
                            $nombreM =$fila->nombreMateria;

                            $contadorDiasMateria = 0;
                            $contadorFinalMateria = 0;

                            if(in_array($listass->Materia,$listaMateriasInscritasNombre)){
                                //si ya se inserto no se hace nada 
                            }else{
                                //si no esta en la lista significa que se debe insertar
                                //se compara el nombre
                                //echo '<br>';
                                if($nombreM == $listass->Materia)
                                {   
                                    //Guardamos los primeros dos digitos de la hora en la que se INICIA la clase 
                                    $HoraInicial = substr($fila->horas, 0, 2);
                                    //Guardamos los primeros dos digitos de la hora en que se TERMINA
                                    $HoraFinal = substr($fila->horas, 3, 2);
                                    //Restamos para saber de cuantas horas es la clase 
                                    $Resta = $HoraFinal - $HoraInicial;

                                    //Si es mayor a 1 significa que la clase dura mas de una hora
                                    if($Resta>1)
                                    {
                                        //Si la materia es de mas de una hora SEGUIDA 

                                        $HoraReffLunes = 0;
                                        $HoraReffMartes = 0;
                                        $HoraReffMiercoles = 0;
                                        $HoraReffJueves = 0;
                                        $HoraReffViernes = 0;
                                        $HoraReffSabado = 0;
                                        //hacemos un ciclo para insertar el numero total de horas

                                        //Referencia para saber de cuantos dias es la materia
                                        if($fila->lunes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->martes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->miercoles == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->jueves == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->viernes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->sabado == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }

                                        //revision dentro de la lista
                                        

                                        $unavezLunes = 0;
                                        $unavezMartes = 0;
                                        $unavezMiercoles = 0;
                                        $unavezJueves = 0;
                                        $unavezViernes = 0;
                                        $unavezSabado = 0;

                                        for($i = 0; $i<$Resta; $i++)
                                        {
                                            if($fila->lunes != "")
                                            {
                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    //poner un if para solo una entrada al contador
                                                    if($unavezLunes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezLunes = 1;
                                                    } 
                                                    $HoraReffLunes == $HoraReffLunes + 1;
                                                }
                                            }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezMartes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMartes = 1;
                                                    } 
                                                    $HoraReffMartes == $HoraReffMartes + 1;
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezMiercoles == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMiercoles = 1;
                                                    } 
                                                    $HoraReffMiercoles == $HoraReffMiercoles + 1;
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezJueves == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezJueves = 1;
                                                    } 
                                                    $HoraReffJueves == $HoraReffJueves + 1;
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezViernes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezViernes = 1;
                                                    } 
                                                    $HoraReffViernes == $HoraReffViernes + 1;
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezSabado == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezSabado = 1;
                                                    } 
                                                    $HoraReffSabado == $HoraReffSabado + 1;
                                                }
                                            }
                                            //TERMINACION DE COMPARACION
                                        }
                                        //echo "Se compara las horas totales: ".$contadorDiasMateria." contra las horas disponibles".$contadorFinalMateria;
                                        if($contadorFinalMateria == $contadorDiasMateria)
                                        {
                                           // echo $listass->valorGrupo;
                                            //SI ENTRA AQUI SIGNIFICA QUE SI HAY ESPACIO PARA METER LA MATERIA
                                            
                                            $brincoLunes = 0;
                                            $brincoMartes = 0;
                                            $brincoMiercoles = 0;
                                            $brincoJueves = 0;
                                            $brincoViernes = 0;
                                            $brincoSabado = 0;

                                            $referenciaSalida = 0;

                                            //se inserta la materia a la lista
                                            array_push($listaMateriasInscritasNombre,$nombreM);
                                            echo 'Se inserto la materia: '.$nombreM." A las: ".$fila->horas." Los dias: ".$fila->dias.' Profesor '.$fila->profesor;
                                            echo '<br>';
                                            
                                            for($i = 0; $i<$Resta; $i++)
                                            {
                                                
                                                    $HoraInsertada = new Hora1($HoraInicial,$nombreM,$lf->nombreCarrera,$fila->dias,$fila->profesor);
                                                    array_push($listaMateriasHorario,$HoraInsertada);
                                                    $HoraInicial  = $HoraInicial + 1;
                                                    //significa que si hay cupo en la hora deseada con los dias deseados
                                                    if($fila->tipo == "L")
                                                    {
                                                        //Si es laboratorio
                                                        if($fila->lunes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";       
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoLunes == 0)
                                                            {
                                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                $brincoLunes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->martes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMartes == 0)
                                                            {
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                $brincoMartes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                //echo '<br>';
                                                            }
                                                            $HoraReffMartes = substr($fila->martes, 0, 2);
                                                            //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                            $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                            array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                            $HoraReffMartes = $HoraReffMartes + 1;
                                                            //echo '<br>';
                                                        }
                                                        if($fila->miercoles == "")
                                                        {
                                                            //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMiercoles == 0)
                                                            {
                                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                $brincoMiercoles = 1;
                                                                //echo '<br>';

                                                            }else{
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->jueves == "")
                                                        {
                                                        // echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoJueves == 0)
                                                            {
                                                                $horaDia = $HoraInicial."jueves";
                                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                $brincoJueves = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->viernes == "")
                                                        {
                                                        //echo "No existe clases los lunes ";
                                                        }else{
                                                            
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoViernes == 0)
                                                            {
                                                                $horaDia = $HoraInicial." viernes";
                                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                $brincoViernes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                //echo '<br>';
                                                            }
                                                            
                                                        }
                                                        if($fila->sabado == "")
                                                        {
                                                            //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoSabado == 0)
                                                            {
                                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                                $brincoSabado = 1;
                                                            }else{
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                            }
                                                        }
                                                    }else{
                                                        //SI NO es laboratorio
                                                        if($fila->lunes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";       
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoLunes == 0)
                                                            {
                                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                $brincoLunes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                            //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                $HoraReffLunes = $HoraReffLunes + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->martes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";
                                                        }else{
                                                            //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMartes == 0)
                                                            {
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                $brincoMartes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                //echo '<br>';
                                                            }
                                                            $HoraReffMartes = substr($fila->martes, 0, 2);
                                                            //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                            $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                            array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                            $HoraReffMartes = $HoraReffMartes + 1;
                                                            //echo '<br>';
                                                        }
                                                        if($fila->miercoles == "")
                                                        {
                                                            // echo "No existe clases los lunes ";
                                                        }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoMiercoles == 0)
                                                            {
                                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                $brincoMiercoles = 1;
                                                                //echo '<br>';

                                                            }else{
                                                                //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->jueves == "")
                                                        {
                                                            // echo "No existe clases los lunes ";
                                                        }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoJueves == 0)
                                                            {
                                                                $horaDia = $HoraInicial."jueves";
                                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                $brincoJueves = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                $HoraReffJueves = $HoraReffJueves + 1;
                                                                //echo '<br>';
                                                            }
                                                        }
                                                        if($fila->viernes == "")
                                                        {
                                                            //echo "No existe clases los lunes ";
                                                        }else{                                                 
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoViernes == 0)
                                                            {
                                                                $horaDia = $HoraInicial." viernes";
                                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                                //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                $brincoViernes = 1;
                                                                //echo '<br>';
                                                            }else{
                                                                //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                $HoraReffViernes = $HoraReffViernes + 1;
                                                                //echo '<br>';
                                                            }                                                   
                                                        }
                                                        if($fila->sabado == "")
                                                        {
                                                            // echo "No existe clases los lunes ";
                                                        }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                            if($brincoSabado == 0)
                                                            {
                                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                                //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                                $brincoSabado = 1;
                                                            }else{
                                                            // echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                                //echo '<br>';
                                                                $HoraReffSabado = $HoraReffSabado + 1;
                                                            }
                                                        }
                                                    }
                                            }
                                            $Resta = 0;
                                        }else{
                                            //EL HORARIO NO SE PUDO INSERTAR por que se empalmo
                                        }
                                        //si eres de una sola hora
                                        //----------------------------------------------------------------------------------------
                                    }else{
                                        //Si no es mayor a 1 significa que la clase solo es de una hora                                  
                                        //Referencia para saber de cuantos dias es la materia
                                            if($fila->lunes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->martes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->miercoles == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->jueves == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->viernes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->sabado == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }

                                            
                                                if($fila->lunes != "")
                                                {
                                                    $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                    if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                    {
                                                        //si existes significa que no se puede insertar 
                                                    }else{
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;                                                       
                                                    }
                                                }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }

                                            //echo "Se compara las horas totales: ".$contadorDiasMateria." contra las horas disponibles".$contadorFinalMateria;
                                            //TERMINACION DE COMPARACION
                                            if($contadorFinalMateria == $contadorDiasMateria)
                                            {
                                                
                                                //echo $listass->valorGrupo;
                                                $brincoLunes = 0;
                                                $brincoMartes = 0;
                                                $brincoMiercoles = 0;
                                                $brincoJueves = 0;
                                                $brincoViernes = 0;
                                                $brincoSabado = 0;

                                                //Significa que si hay espacio
                                                array_push($listaMateriasInscritasNombre,$nombreM);
                                                echo 'Se inserto la materia: '.$nombreM." A las: ".$fila->horas." Los dias: ".$fila->dias.' Profesor: '.$fila->profesor;
                                                echo '<br>';
                                                $HoraInsertada = new Hora1($HoraInicial,$nombreM,$lf->nombreCarrera,$fila->dias,$fila->profesor);
                                                array_push($listaMateriasHorario,$HoraInsertada);
                                                // echo '<h5>'.$fila->tipo.'</h5>';
                                                //Si es laboratorio
                                                if($fila->lunes == "")
                                                {
                                                    //echo "No existe clases los lunes ";       
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoLunes == 0)
                                                    {
                                                        $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                        $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                        $HoraReffLunes = $HoraReffLunes + 1;
                                                        $brincoLunes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                        $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                        $HoraReffLunes = $HoraReffLunes + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->martes == "")
                                                {
                                                //echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoMartes == 0)
                                                    {
                                                        $HoraReffMartes = substr($fila->martes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                        $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                        $HoraReffMartes = $HoraReffMartes + 1;
                                                        $brincoMartes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                        $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                        $HoraReffMartes = $HoraReffMartes + 1;
                                                        //echo '<br>';
                                                    }
                                                    $HoraReffMartes = substr($fila->martes, 0, 2);
                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                    //echo '<br>';
                                                }
                                                if($fila->miercoles == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoMiercoles == 0)
                                                    {
                                                        $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                        $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                        $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                        $brincoMiercoles = 1;
                                                        //echo '<br>';

                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                        $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                        $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->jueves == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoJueves == 0)
                                                    {
                                                        $horaDia = $HoraInicial."jueves";
                                                        $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                        $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        $HoraReffJueves = $HoraReffJueves + 1;
                                                        $brincoJueves = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                        $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        $HoraReffJueves = $HoraReffJueves + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->viernes == "")
                                                {
                                                //echo "No existe clases los lunes ";
                                                }else{
                                                    
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoViernes == 0)
                                                    {
                                                        $horaDia = $HoraInicial." viernes";
                                                        $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                        $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                        $HoraReffViernes = $HoraReffViernes + 1;
                                                        $brincoViernes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                        $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                        $HoraReffViernes = $HoraReffViernes + 1;
                                                        //echo '<br>';
                                                    }
                                                
                                                }
                                                if($fila->sabado == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoSabado == 0)
                                                    {
                                                        $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                        $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                        array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                        //echo '<br>';
                                                        $HoraReffSabado = $HoraReffSabado + 1;
                                                        $brincoSabado = 1;
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                        $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                        array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                        //echo '<br>';
                                                        $HoraReffSabado = $HoraReffSabado + 1;
                                                    }
                                                }
                                                /*********************************************************************** */
                                            }else{
                                            }

                                    }
                                }
                            }
                        }
                    }

                }else{

                    /*-------------------------------------------------------------------------------------------------------------------- */    
                    echo '<h4>'.$r.'</h4>';
                    //guardamos el nombre de la carrera
                    $carrera = $lf->nombreCarrera;
                    echo '<h5>'.$carrera.'</h5>';
                    //lista donde se va a guardar las horas de la carrera
                    $listaHorasOcupada = array();
                    //lista de Hora y Dia ocupada
                    $listaDiaHoraOcupado = array("");
                    //acomodamos la lista
                    uasort($lf->listaMaterias, array($this, 'sbo'));
                    //lista que nos dira que materias YA estan insertadas
                    
                    //foreach para recorrer las materias de la carrera con la informacion

                    //NUMERO DE HORARIO A REALIZAR
                    $NumeroReferenciaHorario = 1;

                    $listaMateriasHorario = array();

                                
                    foreach ($lf->listaMaterias as $listass) {

                        $contadorDiasMateria = 0;
                        $contadorFinalMateria = 0;

                        foreach ($listaGrupos as $clave => $fila) {

                            //guardamos la variable que vamos a comparar esta variable es la que se esta recorriendo del archivo
                            //Comparamos si la materia con pocos grupos es igual al recorrido dentro del archivo 
                            $nombreM =$fila->nombreMateria;

                            $contadorDiasMateria = 0;
                            $contadorFinalMateria = 0;

                            if(in_array($listass->Materia,$listaMateriasInscritasNombre)){
                                //si ya se inserto no se hace nada 
                            }else{
                                //si no esta en la lista significa que se debe insertar
                                //se compara el nombre
                                //echo '<br>';
                                if($nombreM == $listass->Materia)
                                {   
                                    //Guardamos los primeros dos digitos de la hora en la que se INICIA la clase 
                                    $HoraInicial = substr($fila->horas, 0, 2);
                                    //Guardamos los primeros dos digitos de la hora en que se TERMINA
                                    $HoraFinal = substr($fila->horas, 3, 2);
                                    //Restamos para saber de cuantas horas es la clase 
                                    $Resta = $HoraFinal - $HoraInicial;

                                    //Si es mayor a 1 significa que la clase dura mas de una hora
                                    if($Resta>1)
                                    {
                                        //Si la materia es de mas de una hora SEGUIDA 

                                        $HoraReffLunes = 0;
                                        $HoraReffMartes = 0;
                                        $HoraReffMiercoles = 0;
                                        $HoraReffJueves = 0;
                                        $HoraReffViernes = 0;
                                        $HoraReffSabado = 0;
                                        //hacemos un ciclo para insertar el numero total de horas

                                        //Referencia para saber de cuantos dias es la materia
                                        if($fila->lunes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->martes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->miercoles == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->jueves == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->viernes == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }
                                        if($fila->sabado == "")
                                        {
                                            //si esta vacio no cuenta 
                                        }else{
                                            $contadorDiasMateria = $contadorDiasMateria + 1;
                                        }

                                        //revision dentro de la lista
                                        

                                        $unavezLunes = 0;
                                        $unavezMartes = 0;
                                        $unavezMiercoles = 0;
                                        $unavezJueves = 0;
                                        $unavezViernes = 0;
                                        $unavezSabado = 0;

                                        for($i = 0; $i<$Resta; $i++)
                                        {
                                            if($fila->lunes != "")
                                            {
                                                $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    //poner un if para solo una entrada al contador
                                                    if($unavezLunes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezLunes = 1;
                                                    } 
                                                    $HoraReffLunes == $HoraReffLunes + 1;
                                                }
                                            }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezMartes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMartes = 1;
                                                    } 
                                                    $HoraReffMartes == $HoraReffMartes + 1;
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezMiercoles == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezMiercoles = 1;
                                                    } 
                                                    $HoraReffMiercoles == $HoraReffMiercoles + 1;
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezJueves == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezJueves = 1;
                                                    } 
                                                    $HoraReffJueves == $HoraReffJueves + 1;
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezViernes == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezViernes = 1;
                                                    } 
                                                    $HoraReffViernes == $HoraReffViernes + 1;
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar
                                                    $contadorFinalMateria = 10000;
                                                }else{
                                                    if($unavezSabado == 0)
                                                    {
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;
                                                        $unavezSabado = 1;
                                                    } 
                                                    $HoraReffSabado == $HoraReffSabado + 1;
                                                }
                                            }
                                            //TERMINACION DE COMPARACION
                                        }
                                        //echo "Se compara las horas totales: ".$contadorDiasMateria." contra las horas disponibles".$contadorFinalMateria;
                                        if($contadorFinalMateria == $contadorDiasMateria)
                                        {

                                            //cuando una materia tiene multiples horas seguidas

                                            
                                            //echo $listass->valorGrupo;
                                            $bandera = 0;

                                            if($listass->valorGrupo > 2)
                                            {
                                                foreach($listaAuxiliarHorarios as $lh)
                                                {
                                                    foreach($lh as $recorrido)
                                                    {
                                                        //echo $recorrido->campo;
                                                        //echo $recorrido->hora;
                                                        if($nombreM == $recorrido->campo)
                                                        {
                                                            $Hora1 = substr($fila->horas, 0, 2);
                                                            $Hora2 = substr($recorrido->hora, 0, 2);
                                                            $HoraA = strval($fila->horas);
                                                            $HoraB = strval($recorrido->hora);
                                                            //echo 'La materia '.$nombreM." Hora: ".$HoraA.' VS '.' La materia '.$recorrido->campo.' Hora: '.$HoraB;
                                                            //echo '<br>';
                                                            if($HoraA == $HoraB)
                                                            {          
                                                                //echo 'Entro';                                       
                                                                $bandera = 1;
                                                            }
                                                        }
                                                    }
                                                }
    
                                            }

                                            if($bandera == 1)
                                            {
                                                $bandera == 0;
                                            }else
                                            {
                                                //SI ENTRA AQUI SIGNIFICA QUE SI HAY ESPACIO PARA METER LA MATERIA
                                                
                                                $brincoLunes = 0;
                                                $brincoMartes = 0;
                                                $brincoMiercoles = 0;
                                                $brincoJueves = 0;
                                                $brincoViernes = 0;
                                                $brincoSabado = 0;

                                                $referenciaSalida = 0;

                                                //se inserta la materia a la lista
                                                array_push($listaMateriasInscritasNombre,$nombreM);
                                                echo 'Se inserto la materia: '.$nombreM." A las: ".$fila->horas." Los dias: ".$fila->dias.' Profesor '.$fila->profesor;
                                                echo '<br>';
                                                
                                                for($i = 0; $i<$Resta; $i++)
                                                {
                                                    
                                                    $HoraInsertada = new Hora1($HoraInicial,$nombreM,$lf->nombreCarrera,$fila->dias,$fila->profesor);
                                                    array_push($listaMateriasHorario,$HoraInsertada);
                                                    $HoraInicial  = $HoraInicial + 1;
                                                    //significa que si hay cupo en la hora deseada con los dias deseados
                                                        if($fila->tipo == "L")
                                                        {
                                                            //Si es laboratorio
                                                            if($fila->lunes == "")
                                                            {
                                                                //echo "No existe clases los lunes ";       
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoLunes == 0)
                                                                {
                                                                    $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                    $HoraReffLunes = $HoraReffLunes + 1;
                                                                    $brincoLunes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                    $HoraReffLunes = $HoraReffLunes + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->martes == "")
                                                            {
                                                            //echo "No existe clases los lunes ";
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoMartes == 0)
                                                                {
                                                                    $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                                    $brincoMartes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                                    //echo '<br>';
                                                                }
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                //echo '<br>';
                                                            }
                                                            if($fila->miercoles == "")
                                                            {
                                                                //echo "No existe clases los lunes ";
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoMiercoles == 0)
                                                                {
                                                                    $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                    $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                    $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                    $brincoMiercoles = 1;
                                                                    //echo '<br>';

                                                                }else{
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                    $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                    $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->jueves == "")
                                                            {
                                                            // echo "No existe clases los lunes ";
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoJueves == 0)
                                                                {
                                                                    $horaDia = $HoraInicial."jueves";
                                                                    $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                    $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    $HoraReffJueves = $HoraReffJueves + 1;
                                                                    $brincoJueves = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                    $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    $HoraReffJueves = $HoraReffJueves + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->viernes == "")
                                                            {
                                                            //echo "No existe clases los lunes ";
                                                            }else{
                                                                
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoViernes == 0)
                                                                {
                                                                    $horaDia = $HoraInicial." viernes";
                                                                    $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                    $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                    $HoraReffViernes = $HoraReffViernes + 1;
                                                                    $brincoViernes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                    $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                    $HoraReffViernes = $HoraReffViernes + 1;
                                                                    //echo '<br>';
                                                                }
                                                                
                                                            }
                                                            if($fila->sabado == "")
                                                            {
                                                                //echo "No existe clases los lunes ";
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoSabado == 0)
                                                                {
                                                                    $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                    $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    //echo '<br>';
                                                                    $HoraReffSabado = $HoraReffSabado + 1;
                                                                    $brincoSabado = 1;
                                                                }else{
                                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                    $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    //echo '<br>';
                                                                    $HoraReffSabado = $HoraReffSabado + 1;
                                                                }
                                                            }
                                                        }else{
                                                            //SI NO es laboratorio
                                                            if($fila->lunes == "")
                                                            {
                                                                //echo "No existe clases los lunes ";       
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoLunes == 0)
                                                                {
                                                                    $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                    $HoraReffLunes = $HoraReffLunes + 1;
                                                                    $brincoLunes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                //echo 'La materia '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                                    $HoraReffLunes = $HoraReffLunes + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->martes == "")
                                                            {
                                                                //echo "No existe clases los lunes ";
                                                            }else{
                                                                //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoMartes == 0)
                                                                {
                                                                    $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                                    $brincoMartes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                                    //echo '<br>';
                                                                }
                                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                                //echo 'La materia '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                                array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                                $HoraReffMartes = $HoraReffMartes + 1;
                                                                //echo '<br>';
                                                            }
                                                            if($fila->miercoles == "")
                                                            {
                                                                // echo "No existe clases los lunes ";
                                                            }else{
                                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoMiercoles == 0)
                                                                {
                                                                    $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                    $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                    $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                    $brincoMiercoles = 1;
                                                                    //echo '<br>';

                                                                }else{
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                                    $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                                    $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->jueves == "")
                                                            {
                                                                // echo "No existe clases los lunes ";
                                                            }else{
                                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoJueves == 0)
                                                                {
                                                                    $horaDia = $HoraInicial."jueves";
                                                                    $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                    $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    $HoraReffJueves = $HoraReffJueves + 1;
                                                                    $brincoJueves = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                                    $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                                    $HoraReffJueves = $HoraReffJueves + 1;
                                                                    //echo '<br>';
                                                                }
                                                            }
                                                            if($fila->viernes == "")
                                                            {
                                                                //echo "No existe clases los lunes ";
                                                            }else{                                                 
                                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoViernes == 0)
                                                                {
                                                                    $horaDia = $HoraInicial." viernes";
                                                                    $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                                    //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                    $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                    $HoraReffViernes = $HoraReffViernes + 1;
                                                                    $brincoViernes = 1;
                                                                    //echo '<br>';
                                                                }else{
                                                                    //echo 'La materia varias horas mismo dia '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                                    $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                                    $HoraReffViernes = $HoraReffViernes + 1;
                                                                    //echo '<br>';
                                                                }                                                   
                                                            }
                                                            if($fila->sabado == "")
                                                            {
                                                                // echo "No existe clases los lunes ";
                                                            }else{
                                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                                if($brincoSabado == 0)
                                                                {
                                                                    $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                                    //echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                    $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                                    //echo '<br>';
                                                                    $HoraReffSabado = $HoraReffSabado + 1;
                                                                    $brincoSabado = 1;
                                                                }else{
                                                                // echo 'La materia '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                                    $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                                    array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                                    //echo '<br>';
                                                                    $HoraReffSabado = $HoraReffSabado + 1;
                                                                }
                                                            }
                                                        }
                                                }
                                                $Resta = 0;
                                            }

                                        }else{
                                            //EL HORARIO NO SE PUDO INSERTAR por que se empalmo
                                        }
                                        //si eres de una sola hora
                                        //----------------------------------------------------------------------------------------
                                    }else{
                                        //Si no es mayor a 1 significa que la clase solo es de una hora                                  
                                        //Referencia para saber de cuantos dias es la materia
                                            if($fila->lunes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->martes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->miercoles == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->jueves == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->viernes == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }
                                            if($fila->sabado == "")
                                            {
                                                //si esta vacio no cuenta 
                                            }else{
                                                $contadorDiasMateria = $contadorDiasMateria + 1;
                                            }

                                            
                                                if($fila->lunes != "")
                                                {
                                                    $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                    $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                    if(in_array($horaDiaLunes,$listaDiaHoraOcupado))
                                                    {
                                                        //si existes significa que no se puede insertar 
                                                    }else{
                                                        $contadorFinalMateria = $contadorFinalMateria + 1;                                                       
                                                    }
                                                }
                                            if($fila->martes != "")
                                            {
                                                $HoraReffMartes = substr($fila->martes, 0, 2);
                                                $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                if(in_array($horaDiaMartes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->miercoles != "")
                                            {
                                                $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                if(in_array($horaDiaMiercoles,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->jueves != "")
                                            {
                                                $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                if(in_array($horaDiaJueves,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->viernes != "")
                                            {
                                                $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                if(in_array($horaDiaViernes,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }
                                            if($fila->sabado != "")
                                            {
                                                $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                if(in_array($horaDiaSabado,$listaDiaHoraOcupado))
                                                {
                                                    //si existes significa que no se puede insertar 
                                                }else{
                                                    $contadorFinalMateria = $contadorFinalMateria + 1;
                                                    
                                                }
                                            }

                                            //echo "Se compara las horas totales: ".$contadorDiasMateria." contra las horas disponibles".$contadorFinalMateria;
                                            //TERMINACION DE COMPARACION
                                            if($contadorFinalMateria == $contadorDiasMateria)
                                            {
                                                //echo $listass->valorGrupo;
                                                $bandera = 0;

                                                if($listass->valorGrupo > 2)
                                                {
                                                    foreach($listaAuxiliarHorarios as $lh)
                                                    {
                                                        foreach($lh as $recorrido)
                                                        {
                                                            //echo $recorrido->campo;
                                                            //echo $recorrido->hora;
                                                            if($nombreM == $recorrido->campo)
                                                            {
                                                                $Hora1 = substr($fila->horas, 0, 2);
                                                                $Hora2 = substr($recorrido->hora, 0, 2);
                                                                $HoraA = strval($Hora1);
                                                                $HoraB = strval($Hora2);
                                                                //echo 'La materia '.$nombreM." Hora: ".$HoraA.' VS '.' La materia '.$recorrido->campo.' Hora: '.$HoraB;
                                                                //echo '<br>';
                                                                if($HoraA == $HoraB)
                                                                {                                                 
                                                                    $bandera = 1;
                                                                }
                                                            }
                                                        }
                                                    }
        
                                                }

                                                if($bandera == 1)
                                                {
                                                    $bandera == 0;
                                                }else{
                                                                                                    

                                                $brincoLunes = 0;
                                                $brincoMartes = 0;
                                                $brincoMiercoles = 0;
                                                $brincoJueves = 0;
                                                $brincoViernes = 0;
                                                $brincoSabado = 0;

                                                //Significa que si hay espacio
                                                array_push($listaMateriasInscritasNombre,$nombreM);
                                                echo 'Se inserto la materia: '.$nombreM." A las: ".$fila->horas." Los dias: ".$fila->dias.' Profesor: '.$fila->profesor;
                                                echo '<br>';
                                                $HoraInsertada = new Hora1($HoraInicial,$nombreM,$lf->nombreCarrera,$fila->dias,$fila->profesor);
                                                array_push($listaMateriasHorario,$HoraInsertada);
                                                // echo '<h5>'.$fila->tipo.'</h5>';
                                                //Si es laboratorio
                                                if($fila->lunes == "")
                                                {
                                                    //echo "No existe clases los lunes ";       
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoLunes == 0)
                                                    {
                                                        $HoraReffLunes = substr($fila->lunes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                        $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                        $HoraReffLunes = $HoraReffLunes + 1;
                                                        $brincoLunes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio'.$nombreM." Se inserto el dia lunes a las: ".$HoraReffLunes;
                                                        $horaDiaLunes = 'lunes'.$HoraReffLunes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaLunes);
                                                        $HoraReffLunes = $HoraReffLunes + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->martes == "")
                                                {
                                                //echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoMartes == 0)
                                                    {
                                                        $HoraReffMartes = substr($fila->martes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                        $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                        $HoraReffMartes = $HoraReffMartes + 1;
                                                        $brincoMartes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                        $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                        $HoraReffMartes = $HoraReffMartes + 1;
                                                        //echo '<br>';
                                                    }
                                                    $HoraReffMartes = substr($fila->martes, 0, 2);
                                                    //echo 'El laboratorio '.$nombreM." Se inserto el dia martes a las: ".$HoraReffMartes;
                                                    $horaDiaMartes = 'martes'.$HoraReffMartes;
                                                    array_push($listaDiaHoraOcupado,$horaDiaMartes);
                                                    $HoraReffMartes = $HoraReffMartes + 1;
                                                    //echo '<br>';
                                                }
                                                if($fila->miercoles == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoMiercoles == 0)
                                                    {
                                                        $HoraReffMiercoles = substr($fila->miercoles, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                        $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                        $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                        $brincoMiercoles = 1;
                                                        //echo '<br>';

                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia miercoles a las: ".$HoraReffMiercoles;
                                                        $horaDiaMiercoles = 'miercoles'.$HoraReffMiercoles;
                                                        array_push($listaDiaHoraOcupado,$horaDiaMiercoles);
                                                        $HoraReffMiercoles = $HoraReffMiercoles + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->jueves == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoJueves == 0)
                                                    {
                                                        $horaDia = $HoraInicial."jueves";
                                                        $HoraReffJueves = substr($fila->jueves, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                        $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        $HoraReffJueves = $HoraReffJueves + 1;
                                                        $brincoJueves = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia jueves a las: ".$HoraReffJueves;
                                                        $horaDiaJueves = 'jueves'.$HoraReffJueves;
                                                        array_push($listaDiaHoraOcupado,$horaDiaJueves);
                                                        $HoraReffJueves = $HoraReffJueves + 1;
                                                        //echo '<br>';
                                                    }
                                                }
                                                if($fila->viernes == "")
                                                {
                                                //echo "No existe clases los lunes ";
                                                }else{
                                                    
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoViernes == 0)
                                                    {
                                                        $horaDia = $HoraInicial." viernes";
                                                        $HoraReffViernes = substr($fila->viernes, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                        $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                        $HoraReffViernes = $HoraReffViernes + 1;
                                                        $brincoViernes = 1;
                                                        //echo '<br>';
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia viernes a las: ".$HoraReffViernes;
                                                        $horaDiaViernes = 'viernes'.$HoraReffViernes;
                                                        array_push($listaDiaHoraOcupado,$horaDiaViernes);
                                                        $HoraReffViernes = $HoraReffViernes + 1;
                                                        //echo '<br>';
                                                    }
                                                
                                                }
                                                if($fila->sabado == "")
                                                {
                                                // echo "No existe clases los lunes ";
                                                }else{
                                                    //si fila es diferente de vacio significa que la hora se ocupa ahi
                                                    if($brincoSabado == 0)
                                                    {
                                                        $HoraReffSabado = substr($fila->sabado, 0, 2);
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                        $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                        array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                        //echo '<br>';
                                                        $HoraReffSabado = $HoraReffSabado + 1;
                                                        $brincoSabado = 1;
                                                    }else{
                                                        //echo 'El laboratorio '.$nombreM." Se inserto el dia sabado a las: ".$HoraReffSabado;
                                                        $horaDiaSabado = 'sabado'.$HoraReffSabado;
                                                        array_push($listaDiaHoraOcupado,$horaDiaSabado);
                                                        //echo '<br>';
                                                        $HoraReffSabado = $HoraReffSabado + 1;
                                                    }
                                                }
                                                /*********************************************************************** */
                                                }
                                            }else{
                                        }

                                    }
                                }
                            }
                        }
                    }

                }
            }
            
            sort($listaMateriasHorario);
            $HF = new HorarioFinal($i,$listaAuxiliarHorarios);
            array_push($listaMateriasInscritasHora, $HF);                
        }


        //MIGUELASIGNACION
        //CLASES -> Horariofinal /  Hora1
        foreach($listaMateriasInscritasHora as $final)
        {
            foreach($final->listaDia as $horario)
            {
                foreach($horario as $p)
                {
                    $p->campo;
                }
            }
        }


        //AYUDAME MIGUEEEEEL JAJA


        $ReporteErrores = new ObjetoAdvErro($listaERRORES);
        $ReporteAdvertencias = new ObjetoAdvErro($listaAdvertencias);
        array_push($ReporteFinal,$ReporteAdvertencias);
        array_push($ReporteFinal,$ReporteErrores);
        return $ReporteFinal;
    }
    /*FIN PRUEBAS**************************************************************************************************************/
}
