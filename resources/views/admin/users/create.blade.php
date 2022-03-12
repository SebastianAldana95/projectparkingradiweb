@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ingresar Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-auto">
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
                                       value="{{ old('name') }}">
                                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input id="email"
                                       name="email"
                                       type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       value="{{ old('email') }}">
                                {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <label for="document">Cedula:</label>
                                <input id="document"
                                       name="document"
                                       type="number"
                                       class="form-control {{ $errors->has('document') ? 'is-invalid' : '' }}"
                                       value="{{ old('document') }}">
                                {!! $errors->first('document', '<span class="invalid-feedback">:message</span>') !!}
                            </div>

                            <small class="form-group form-text text-muted">La contraseña será generada y enviada al nuevo usuario via email</small>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Crear usuario</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
