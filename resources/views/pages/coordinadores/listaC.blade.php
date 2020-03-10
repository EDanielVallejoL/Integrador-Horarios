@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Coordinadores</h1>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($coordinadores as $coordinador)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$coordinador->name}}</td>
                <td>{{$coordinador->lastname}}</td>
                <td>{{$coordinador->email}}</td>
                <td>{{$coordinador->carrera}}</td>
                <td>Editar |

                    <form method="post" action="{{ url('/coordinadores', ['id' => $coordinador->id])}}">

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