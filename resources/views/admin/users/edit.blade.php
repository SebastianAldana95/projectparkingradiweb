@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Datos del propietario</h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input id="name"
                                       name="name"
                                       type="text"
                                       class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       value="{{ old('name', $user->name) }}">
                                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email"
                                       name="email"
                                       type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       value="{{ old('email', $user->email) }}">
                                {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="document">Cedula:</label>
                                <input id="document"
                                       name="document"
                                       type="number"
                                       class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}"
                                       value="{{ old('document', $user->document) }}">
                                {!! $errors->first('document', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña: </label>
                                <input id="password"
                                       name="password"
                                       type="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="Contraseña"
                                >
                                {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                                <small class="form-text text-muted">Dejar en blanco para no cambiar contraseña</small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña:</label>
                                <input id="password_confirmation"
                                       name="password_confirmation"
                                       type="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="Repite la contraseña"
                                >
                                {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Actualizar usuario</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Asignar Vehiculo</h3>
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
