@extends('layouts.app')

@section('content')

<form action="carrera" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card bg-success text-white" style="width: 25rem;">
    <div class="card-header">
      Archivos necesarios
    </div>
    <div class="form-group">
      <label for="">Archivo MPN</label>
      <input type="file" name="excel">

      <label for="">Archivo horarios</label>
      <input type="file" name="grupos">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

@endsection



