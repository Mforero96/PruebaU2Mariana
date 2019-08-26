@extends('layouts.app')

@section('title', 'Lista Pasatiempos')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Usuarios</div>

                <div class="card-body">
                   <form action="{{ url('/admin/usuarios/add') }}" method="post">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user->name }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ? old('username') : $user->username }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Departments') }}</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control @error('department') is-invalid @enderror" name="department" required>
                                    <option value="">select a department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">
                                            {{ $department->name }}</option>    
                                    @endforeach
                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" required disabled>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>
    
                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="">select a role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{$role->id==$user->role ? "selected" : ""}}>
                                                {{ $role->name }}</option>    
                                        @endforeach
                                    </select>
                                    
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Hobbies') }}</label>
                                <div class="col-md-8"></div>
                        @if (count($hobbies)>0)     
                                
                                @foreach ($hobbies as $hobby)
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                           
                                        <select id="hobby" name="hobby[]" class="form-control" required>
                                            <option value="">select a hobby</option>
                                            @foreach ($listHobbies as $item)
                                            <option value="{{ $item->id }}" {{$item->id==$hobby->hobby ? "selected" : ""}}>
                                                    {{ $item->name }}</option>    
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="userhobbyid[]" value="{{$hobby->id}}">
                                    </div>
                                @endforeach
                        @else
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                
                                <select id="hobby" name="hobby" class="form-control" required>
                                    <option value="">select a hobby</option>
                                    @foreach ($listHobbies as $item)
                                    <option value="{{ $item->id }}" >
                                            {{ $item->name }}</option>    
                                    @endforeach
                                </select>
                                
                            </div>
                        @endif

                
                        
                                
                        </div>



                        <div class="form-group row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                 <input type="submit" value="{{ $user->id ? 'Editar' : 'Crear'}}" class="btn btn-primary">
                                </div>
                        </div>
                        @csrf
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/cities.js')}}"></script>