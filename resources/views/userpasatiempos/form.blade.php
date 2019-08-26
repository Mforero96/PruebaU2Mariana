@extends('layouts.app')

@section('title', 'Formulario pasatiempos')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pasatiempos</div>

                <div class="card-body">
                <form action="{{ url('/user/pasatiempos/add') }}" method="post">
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$id}}">
                        <select name="pasatiempo" id="pasatiempo">
                            <option value="">Seleccione su pasatiempo</option>
                            @foreach ($pasatiempos as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option {{$id==$p->id ? 'selected' : ''}}>
                            @endforeach
                        </select>
                        <input type="submit" value="{{ $id ? 'Editar' : 'Añadir' }}">
                        @csrf
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection