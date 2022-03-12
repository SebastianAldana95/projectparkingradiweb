<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Type;
use App\Models\User;
use App\Providers\UserCreated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $users = User::with('vehicles')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $password = Str::random('8');
        $user->password = $password;
        $user->document = $request->get('document');
        $user->saveOrFail();

        UserCreated::dispatch($user, $password);

        return redirect()->route('admin.users.index')
            ->withFlash('El usuario ha sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|View|Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
            'vehicles' => $user->vehicles()->with('type')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'types' => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        if ($request->filled('plate') && $request->filled('brand') && $request->filled('type_id'))
        {
            $user->vehicles()->create([
                'plate' => $request->get('plate'),
                'brand' => $request->get('brand'),
                'type_id' => $request->get('type_id'),
            ]);
        }
        return redirect()->route('admin.users.edit', $user)
            ->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->vehicles()->delete();
        $user->delete();

        return redirect()->route('admin.users.index')
            ->withFlash('Usuario eliminado!');
    }
}
