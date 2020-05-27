@extends('layouts.app')

@section('content')

<form action="carrera" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card alert alert-success text-black" style="width: 27rem;">
    <div class="card-header">
      Cargar archivos necesarios
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

