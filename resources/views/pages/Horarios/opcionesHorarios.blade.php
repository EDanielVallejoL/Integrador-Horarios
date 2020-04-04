@extends('layouts.app')

@section('content')


<div class="container">
    <div class="p-3 mb-2 bg-white text-dark">
        <h1>Horarios</h1>
        <?php
        foreach ($listaChida as $lista) {
            echo '<h4>' . $lista->numeroHorario . ' ' . $lista->listaDia[0]->carr . '</h4>';
            echo '<br>';
        
            echo '<table class="table table-light" >
                <thead class="thead-light">
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                    </tr>
                </thead>';

            for($i=0; $i < count($lista->listaDia); $i++)
            {

                echo '
                    <tr>
                        <td>' , $lista->listaDia[$i]->hora ,  '</td>



                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 0, 1) == 'L')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            echo "----";
                        }

                echo '</td>
                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 1, 2) == 'Ma')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            if(substr($lista->listaDia[$i]->dias , 0, 2) == 'Ma')
                            {
                                echo $lista->listaDia[$i]->campo;
                            }
                            else{
                                echo '----';
                            }
                        }
                echo '</td>
                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 3, 2) == 'Mi')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            if(substr($lista->listaDia[$i]->dias , 0, 2) == 'Ma')
                            {
                                echo $lista->listaDia[$i]->campo;
                            }
                            else{
                                echo '---';
                            }
                        }
                
                echo '</td>
                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 5, 1) == 'J')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            if(substr($lista->listaDia[$i]->dias , 0, 2) == 'Ma')
                            {
                                echo $lista->listaDia[$i]->campo;
                            }
                            else{
                                echo '---';
                            }
                        }

                echo '</td>
                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 6, 1) == 'V')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            if(substr($lista->listaDia[$i]->dias , 0, 2) == 'Ma')
                            {
                                echo $lista->listaDia[$i]->campo;
                            }
                            else{
                                echo '---';
                            }
                        }

                echo '</td>
                        <td>';
                        if(substr($lista->listaDia[$i]->dias , 7, 1) == 'S')
                        {
                            echo $lista->listaDia[$i]->campo;
                        }
                        else
                        {
                            echo '---';
                        }


                echo    '</td>
                    </tr>
                ';


                //echo '<h5>' . $lista->listaDia[$i]->campo . ' a la hora: ' . $lista->listaDia[$i]->hora . ' los dias: ' . $lista->listaDia[$i]->dias.'</h5>';
                //echo '<br>';

            }
            // FIN TABLA
            echo '</table>';
        }
        ?>
    </div>
</div>

@endsection