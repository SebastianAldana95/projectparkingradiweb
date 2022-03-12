@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Todos los vehiculos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Vehiculos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Listado de vehiculos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="vehicles-table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Tipo de vehiculo</th>
                                    <th>Fecha de registro</th>
                                    <th>Propietario</th>
                                    <th>Cedula</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>{{ $vehicle->id }}</td>
                                            <td>{{ $vehicle->plate }}</td>
                                            <td>{{ $vehicle->brand }}</td>
                                            <td>{{ $vehicle->type->name }}</td>
                                            <td>{{ $vehicle->created_at->format('m/d/y') }}</td>
                                            <td>{{ $vehicle->user->name }}</td>
                                            <td>{{ $vehicle->user->document }}</td>
                                            <td>
                                                <a href="{{ route('admin.vehicles.edit', $vehicle) }}"
                                                   class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                                                <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}" style="display: inline">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-xs btn-danger"><i class="fa fa-times"
                                                        onclick="return confirm('¿Estas seguro de eliminar este vehiculo?')">
                                                        </i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
