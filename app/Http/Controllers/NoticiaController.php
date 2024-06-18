<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $noticias = Noticia::paginate(3);

        return view('noticias.index', [
            'noticias' => $noticias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|max:500',
            'fecha' => 'required|date',
            'soloHermano' => 'boolean',
            'contenido' => 'required|max:500',
            'img' => 'nullable|image|max:1024', // máximo 1MB
        ]);


        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->soloHermano = $request->soloHermano;
        $noticia->contenido = $request->contenido;

        if (is_uploaded_file($request->img)) {
            $nombreFoto = time() . "-" . $request->file('img')->getClientOriginalName();
            $noticia->foto = $nombreFoto;
            $request->file('foto')->storeAs('public/planets', $nombreFoto);
        }


        $noticia->store();
        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $noticia = Noticia::find($id);
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|max:500',
            'fecha' => 'required|date',
            'soloHermano' => 'boolean',
            'contenido' => 'required|max:500',
            'img' => 'nullable|image|max:1024', // máximo 1MB
        ]);


        $noticia = Noticia::find($id);


        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->soloHermano = $request->soloHermano;
        $noticia->contenido = $request->contenido;

        if (is_uploaded_file($request->img)) {
            Storage::delete("public/noticias/" . $noticia->foto);
            $nombreFoto = time() . "-" . $request->file('img')->getClientOriginalName();
            $noticia->foto = $nombreFoto;
            $request->file('foto')->storeAs('public/planets', $nombreFoto);
        }


        $noticia->save();
        return redirect()->route('noticias.index');


        $noticia->save();


        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Noticia::destroy($id);


        return redirect()->route('noticias.index');
    }
}
