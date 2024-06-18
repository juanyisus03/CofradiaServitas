<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $roles = ['Administrador', 'Basico', 'Hermano', 'Tesorero', 'Hermano Mayor', 'Presidente  Vocalia', 'Vocal'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create',['roles' => $this->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'rol' => $request['rol']
        ]);

        return $this->index();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user->rol == "Administrador"){
            return redirect("/users");
        }else{
            return view('users.edit', ['roles' => $this->roles, 'user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->rol = $request['rol'];
        $user->email = $request['email'];
        if ($request['password']){
            $user->password = Hash::make($request['password']);
        }
        $user->update();
        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
