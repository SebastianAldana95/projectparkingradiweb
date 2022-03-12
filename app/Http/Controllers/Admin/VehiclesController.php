<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Type;
use App\Models\User;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use App\Providers\UserCreated;
use Illuminate\Support\Str;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('user')->get();
        return view('admin.vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function create()
    {
        return view('admin.vehicles.create', [
            'types' => Type::all()
        ]);
    }

    public function store(StoreVehicleRequest $request)
    {
        $user = new User();
        $vehicle = new Vehicle;
        $vehicle->fill($request->validated());

        if ($request->filled('name') && $request->filled('email') && $request->filled('document'))
        {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->document = $request->get('document');
            $password = Str::random('8');
            $user->password = $password;
            $user->saveOrFail();
            $user->vehicles()->create([
                'plate' => $request->get('plate'),
                'brand' => $request->get('brand'),
                'type_id' => $request->get('type_id'),
                'user_id' => $user->id
            ]);

            UserCreated::dispatch($user, $password);
        }

        return redirect()->route('admin.vehicles.index')
            ->withFlash('El vehiculo ha sido creado y asignado al propietario!');

    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', [
            'vehicle' => $vehicle,
            'user' => $vehicle->user(),
            'types' => Type::all()
        ]);
    }

    public function update(Vehicle $vehicle, UpdateVehicleRequest $request)
    {

        $vehicle->update($request->validated());

        return redirect()
            ->route('admin.vehicles.edit', $vehicle)
            ->with('flash', 'El vehiculo ha sido actualizado!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('admin.vehicles.index')
            ->with('flash', 'El vehiculo ha sido eliminado');
    }
}
