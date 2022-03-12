<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Vehicle::query()->truncate();
        Type::query()->truncate();

        $type = new Type;
        $type->name = 'Motocicleta';
        $type->save();

        $type = new Type;
        $type->name = 'Motocarro';
        $type->save();

        $type = new Type;
        $type->name = 'Mototriciclo';
        $type->save();

        $type = new Type;
        $type->name = 'Cuatrimoto';
        $type->save();

        $type = new Type;
        $type->name = 'Automovil';
        $type->save();

        $type = new Type;
        $type->name = 'Campero';
        $type->save();

        $type = new Type;
        $type->name = 'Camioneta';
        $type->save();

        $type = new Type;
        $type->name = 'Microbus';
        $type->save();


        $vehicle = new Vehicle;
        $vehicle->plate = 'FYQ90A';
        $vehicle->brand = 'Yamaha';
        $vehicle->user_id = 1;
        $vehicle->type_id = 1;
        $vehicle->save();

        $vehicle = new Vehicle;
        $vehicle->plate = 'NFH123';
        $vehicle->brand = 'Nissan';
        $vehicle->user_id = 1;
        $vehicle->type_id = 7;
        $vehicle->save();

        $vehicle = new Vehicle;
        $vehicle->plate = 'AHT453';
        $vehicle->brand = 'Renault';
        $vehicle->user_id = 2;
        $vehicle->type_id = 5;
        $vehicle->save();

    }
}
