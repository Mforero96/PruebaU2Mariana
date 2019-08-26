@extends('layouts.app')

@section('title', 'Lista Pasatiempos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista Pasatiempos 
                    <a href="{{url('/admin/usuarios/crear')}}" class="btn btn-primary float-right">Crear Pasatiempo</a>
                    </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name </th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Role</th>
                                <th>Hobbies</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->username}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->city}}</td>
                                    <td>{{ $user->role}}</td>
                                    <td>{{ $user->hobbies}}</td>
                                    <td>
                                        <a href="{{ url('admin/usuarios/crear/'.$user->id)}}" class="btn btn-success">Editar</a>
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