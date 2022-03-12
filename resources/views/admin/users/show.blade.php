@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detalle del Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active">Detalle</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="/adminlte/img/user4-128x128.jpg"
                             alt="{{ $user->name }}">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cedula</b> <a class="float-right">{{ $user->document }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cantidad Vehiculos</b> <a class="float-right">{{ $user->vehicles->count() }}</a>
                        </li>
                        @if($user->vehicles->count())
                            <li class="list-group-item">
                                @foreach($user->vehicles as $vehicle)
                                    <b>Tipo de Vehiculo</b> <a class="float-right">{{ $vehicle->type->name }}</a>
                                @endforeach
                            </li>
                        @endif
                    </ul>

                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">Vehiculos</div>
                <div class="card-body">
                    @forelse($user->vehicles as $vehicle)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="text-center lead"><b>{{ $vehicle->type->name }}</b></h2>
                                            <p class="text-muted text-sm"><b>Placa: </b> {{ $vehicle->plate }} </p>
                                            <p class="text-muted text-sm"><b>Marca: </b> {{ $vehicle->brand }} </p>
                                            <small class="text-muted"><b>Registro: </b> {{ $vehicle->created_at->format('d/m/Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <small class="text-muted">No tiene ningún vehiculo</small>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
