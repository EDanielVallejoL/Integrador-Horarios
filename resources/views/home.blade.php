@extends('plantilla')

@section('seccion')

<div class="row mt-3">
    <div class="col-12 col-md-4">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="input-excel">
            <label class="custom-file-label " for="input-excel">Choose file</label>
        </div>
        <form id="f_cargar_datos_usuarios" name="f_cargar_datos_usuarios" method="post" action="cargar_datos_usuario" class="formarchivo" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">
            <div class="box-body">
                <div class="custom-file">
                    <input name="archivo" id="archivo" type="file" class="custom-file-input" required>
                    <label class="custom-file-label " for="input-excel">Choose file</label>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cargar Datos</button>
                </div>
            </div>
        </form>
        <div class="text-center">
            <button type="button" class="btn btn-outline-dark mt-3 " id="cMateria">carga</button>
        </div>
        <div class="row mt-3">
            <div class="mx-auto container">
                <select class="form-control" id="comboBoxMaterias">

                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="col">
            <div id="wrapper2">
                <table id="wrapper" class="table table-fixed text-center d-none">
                    <thead class="bg-danger text-white">
                        <tr>
                        </tr>
                    </thead>
                </table>
                <div id="divTablaAux" class="rounded-pill shadow p-3 mb-5 bg-light text-dark border rounded row">
                    <div class="col-12 col-md-6 " id="list1">
                        <ul class="list-unstyled">
                            <li class="font-weight-bold">Clave: </li>
                            <li class="font-weight-bold">Materia requisito 1: </li>
                            <li class="font-weight-bold">Materia requisito 2: </li>

                        </ul>
                    </div>
                    <div class="col-12 col-md-6" id="list2">
                        <ul class="list-unstyled">
                            <li class="font-weight-bold">Computación: </li>
                            <li class="font-weight-bold">Informática: </li>
                            <li class="font-weight-bold">Sistemas Inteligentes: </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="captura" class="mt-1">

</div>

<div id="formula" class="mt-2">

</div>

<div class="col-12 col-md-12 mt-3">
    <button type="button" class="btn btn-success mt-3 " id="add">Cuantos grupos</button>
    <!--<button type="button" class="btn btn-success mt-3 " id="save">Guardar información</button>-->
</div>
<div class="col-12 col-md-12 mt-3">
    <div class="p-1 mb-1 bg-info">
        <label for="idDemanda">Total de alumnos</label>
        <input type="text" class="form-control" id="idDemanda" placeholder="Demanda">
    </div>
    <div class="p-1 mb-1 bg-info">
        <label for="idNsalones">Total de grupos</label>
        <input type="text" class="form-control" id="idNsalones" placeholder="# Grupos">
    </div>
    <div class="p-1 mb-1 bg-info">
        <label for="idPromedioA">Promedio de alumnos por salón</label>
        <input type="text" class="form-control" id="promCupo">
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-12 mt-1">
        <table id="tab" class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Cupo</th>
                </tr>
            </thead>
            <tbody id="tablaRes">

            </tbody>
        </table>
    </div>
</div>
@endsection