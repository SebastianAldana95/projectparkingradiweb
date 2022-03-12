@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Todos los usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                            <h3 class="card-title">Tabla de los usuarios del sistema</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="vehicles-table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Cedula</th>
                                    <th>Vehiculos</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->document }}</td>
                                        <td>{{ collect($user->vehicles->pluck('brand'))->implode(', ') }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $user) }}"
                                               class="btn btn-xs btn-default"
                                            ><i class="fa fa-eye"></i></a>

                                            <a href="{{ route('admin.users.edit', $user) }}"
                                               class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-xs btn-danger"><i class="fa fa-times"
                                                                                         onclick="return confirm('¿Estas seguro de eliminar este usuario?')">
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
