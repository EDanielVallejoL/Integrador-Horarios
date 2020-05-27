@extends('layouts.app')

@section('content')

<form action="carrera" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card alert alert-success text-black" style="width: 27rem;">
    <div class="card-header">
      <h3>Cargar archivos necesarios</h3> 
    </div>
    <div class="form-group">
      <label for="">Archivo MPN</label>
      <input type="file" name="excel" onchange='return isMPN(this)' accept='.xlsx' required >

      <label for="">Archivo horarios</label>
      <input type="file" name="grupos" onchange='return isArchivoHorario(this)' accept='.xlsx' required>

      <label for="">Alumnos aceptados</label>
      <input type="file" name="cupoCarrera" onchange='return isAlumnosAceptados(this)' accept='.xlsx' required >
    </div>

    <button type="submit" class="btn btn-primary">CARGAR</button>
  </div>
</form>

@endsection

@section('content2')

<?php

    include(app_path() . '/BD/abrir.php');
    $consulta = "SELECT * FROM horarios ";
        
    $res = mysqli_query($conexion,$consulta);
    
    if($res->num_rows > 0)
    {
        echo'<script>
            alertify.error("Alerta ya existen estos datos en el sistema envía nuevos archivos para recargar o mira directamente los resultados generados");
          </script>
        ';
    }
?>
@endsection
