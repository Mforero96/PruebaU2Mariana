@extends('layouts.app')

@section('title', 'Formulario pasatiempos')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pasatiempos</div>

                <div class="card-body">
                <form action="{{ url('pasatiempos/add') }}" method="post">
                    <div class="form-group">
                        <label>Nombre Pasatiempo</label>
                        <input type="hidden" name="id" value="{{ $pasatiempo->id }}">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre Pasatiempo" value="{{ $pasatiempo->name }}">
                        <input type="submit" value="{{ $pasatiempo->id ? 'Editar' : 'Crear' }}">
                        @csrf
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection