@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Materias</h1>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Cve_carrera</th>
                <th>Carrera</th>
                <th>Cve_materia</th>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$materia->cve_carrera}}</td>
                <td>{{$materia->carrera}}</td>
                <td>{{$materia->cve_materia}}</td>
                <td>{{$materia->materia}}</td>
                <td>Editar |

                    <form method="post" action="{{ url('/materias', ['id' => $materia->id])}}">

                        <button class="btn btn-danger" type="submit" values="Delete" onclick="return confirm('Borrar?');">Borrar</button>
                        @csrf
                        @method('delete')
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection