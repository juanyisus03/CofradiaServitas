<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enser;
use App\Models\Paso;

class EnserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseres = Enser::paginate(4);
        return view('ensers.index', compact('enseres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasos = Paso::all();
        return view('ensers.create', compact('pasos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enser = new Enser();


        $enser->nombre = $request['nombre'];
        $enser->estado = $request['estado'];

        $enser->cantidad = $request['cantidad'];

        $enser->paso()->associate(Paso::find($request['paso']));

        $enser->save();

        return redirect()->route('ensers.index');

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
        $enser = Enser::find($id);
        return view('ensers.edit', compact('enser'), compact('pasos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enser = Enser::find($id);
        $enser->estado = $request['estado'];
        $enser->nombre = $request['nombre'];
        $enser->cantidad = $request['cantidad'];
        $enser->paso()->disassociate();
        $enser->paso()->associate(Paso::find($request['paso']));
        $enser->update();
        return redirect()->route('ensers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Enser::destroy($id);
        return redirect()->route('ensers.index');
    }
}
