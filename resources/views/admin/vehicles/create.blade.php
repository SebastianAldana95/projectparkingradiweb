@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ingresar Vehiculos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.vehicles.index') }}">Vehiculos</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.vehicles.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Datos del propietario</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name"
                                   name="name"
                                   placeholder="Ingresa nombre del propietario"
                                   type="text"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name') }}">
                            {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email"
                                   name="email"
                                   placeholder="Ingresa email del propietario"
                                   type="email"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   value="{{ old('email') }}">
                            {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="document">Cedula</label>
                            <input id="document"
                                   name="document"
                                   placeholder="Ingresa cedula del propietario"
                                   type="number"
                                   class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}"
                                   value="{{ old('document') }}">
                            {!! $errors->first('document', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <small class="form-group form-text text-muted">La contraseña será generada y enviada al nuevo usuario via email</small>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Datos del vehiculo</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="plate">Placa</label>
                            <input id="plate"
                                   name="plate"
                                   placeholder="Ingresa placa del vehiculo"
                                   type="text"
                                   class="form-control {{ $errors->has('plate') ? 'is-invalid' : '' }}"
                                   value="{{ old('plate') }}">
                            {!! $errors->first('plate', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <input id="brand"
                                   name="brand"
                                   placeholder="Ingresa marca del vehiculo"
                                   type="text"
                                   class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}"
                                   value="{{ old('brand') }}">
                            {!! $errors->first('brand', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo de vehiculo</label>
                            <select id="type_id"
                                    name="type_id"
                                    class="form-control select2 {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
                                <option value="">Selecciona un tipo de vehiculo</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ old('type_id')  }}
                                    >{{ $type->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('type_id', '<span class="invalid-feedback">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
