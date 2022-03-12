@extends('layouts.app')

@section('content')
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <label>
            <input name="plate" cols="30" rows="10">
        </label>
        <button id="create-vehicle">Crear vehivulo</button>
    </form>
@endsection
