@extends('admin.layout')

@section('content')
        <!-- Small Box (Stat card) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $vehicles->count() }}</h3>
                        <p>Vehiculos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <a href="{{ route('admin.vehicles.index') }}" class="small-box-footer">
                        Ver lista de vehiculos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>
                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                        Ver lista de usuarios <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
@stop
