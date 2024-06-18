<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Trono;
use App\Models\Paso;

class TronoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tronos = Trono::all();
        return view('tronos.index', [
            'objetos' => $tronos,
            'class' => class_basename(Trono::class)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasos = Paso::all();
        return view('tronos.create', compact('pasos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $trono = new Trono();

        $trono->estado = $request['estado'];
        $trono->cofradia = $request['cofradia'];
        $trono->paso()->associate(Paso::find($request['paso']));

        $trono->save();
        return redirect()->route('tronos.index');
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
        $pasos = Paso::all();
        $trono = Trono::find($id);
        return view('tronos.edit', compact('trono'), compact('pasos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trono = Trono::find($id);
        $trono->estado = $request['estado'];
        $trono->cofradia = $request['cofradia'];
        $trono->paso()->dissociate();
        $trono->paso()->associate(Paso::find($request['paso']));

        $trono->update();
        return redirect()->route('tronos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Trono::destroy($id);
        return redirect()->route('tronos.index');
    }
}
