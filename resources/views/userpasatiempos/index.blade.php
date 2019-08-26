@extends('layouts.app')

@section('title', 'Lista Pasatiempos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista Pasatiempos 
                    <a href="{{url('/user/pasatiempos/crear')}}" class="btn btn-primary float-right">Añadir Pasatiempo</a>
                    </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Pasatiempo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasatiempoLista as $pasatiempo)
                                <tr>
                                    <td>{{ $pasatiempo->id}}</td>
                                    <td>{{ $pasatiempo->name}}</td>
                                    <td>
                                        <a href="{{ url('/user/pasatiempos/crear/'.$pasatiempo->id)}}" class="btn btn-success">Cambiar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection