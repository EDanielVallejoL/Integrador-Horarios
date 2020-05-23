@extends('layouts.app')

@section('content')

<div class="card alert alert-success text-black" style="width: 27rem;">
    <h1>Horarios</h1>

    <select name="cbCarreras" id="cbCarreras">
        <option value='0' disabled selected hidden>Selecciona una carrera</option>
        <?php

        include(app_path() . '/BD/abrir.php');
        $consulta = "SELECT DISTINCT NombreCarrera FROM Horarios";
        
        $res = mysqli_query($conexion,$consulta);

        while($mostrar = mysqli_fetch_array($res)){
            echo '<option value="' . $mostrar['NombreCarrera'] . '">' . $mostrar['NombreCarrera'] . '</option>';
        }

        ?>

    </select>

    <br>
    <label for="basic-url">Puedes seleccionar otra opción</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Esta es la opcion:</span>
        </div>
        <select name="opcion" id="opcion">
            <?php

            include(app_path() . '/BD/abrir.php');
            $consulta = "SELECT DISTINCT Opcion FROM Horarios";
                
            $res = mysqli_query($conexion,$consulta);

            while($mostrar = mysqli_fetch_array($res)){
                echo '<option value="' . $mostrar['Opcion'] . '">' . $mostrar['Opcion'] . '</option>';
            }

            ?>

        </select>   
    </div> 

</div>
    


@endsection