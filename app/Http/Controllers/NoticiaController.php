<?php

namespace App\Http\Controllers;

use App\Jobs\enviarEmails;
use App\Mail\RecordatorioMail;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user() && auth()->user()->rol != 'Basico' ) {
            $noticias = Noticia::paginate(3);
        } else {
            $noticias = Noticia::where('soloHermano', '0')->paginate(3);
        }
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
            'contenido' => 'required|max:500',
        ]);


        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;

        if($request->has('soloHermano')){
            $noticia->soloHermano = 1;
        }else{
            $noticia->soloHermano = 0;
        }

        $noticia->contenido = $request->contenido;

        $image = $request->file('img');
        $nombre =  time()."_".$image->getClientOriginalName();
        $ruta = $image->storeAs('noticias',  $nombre, 'public');
        $noticia->img = $ruta;

        $noticia->save();
        return redirect()->route('noticias.list');
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
            'contenido' => 'required',

        ]);


        $noticia = Noticia::find($id);

        if($request->has('soloHermano')){
            $noticia->soloHermano = 1;
        }else{
            $noticia->soloHermano = 0;
        }

        $noticia->titulo = $request->titulo;
        $noticia->fecha = $request->fecha;
        $noticia->contenido = $request->contenido;



        if ($request->hasFile('img')) {
            Storage::delete("public/" . $noticia->foto);
            $nombreFoto = time() . "-" . $request->file('img')->getClientOriginalName();
            $noticia->img = $nombreFoto;
            $request->file('img')->storeAs('public/noticias', $nombreFoto);
        }


        $noticia->save();
        return redirect()->route('noticias.list');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Noticia::destroy($id);


        return redirect()->route('noticias.index');
    }

    public function list()
    {

        $noticias = Noticia::paginate(6);

        return view('noticias.list', [
            'noticias' => $noticias,
        ]);
    }

    public function enviarCorreos(){
        $now = Carbon::now();

        $unaSemanaDespues = $now->copy()->addWeek();

        $noticias = Noticia::whereBetween('fecha', [$now, $unaSemanaDespues])->get();

        foreach ($noticias as $noticia) {
            foreach ($noticia->users as $usuario) {
                enviarEmails::dispatch($usuario,$noticia);
            }
        }


        return redirect()->route('noticias.list');
    }

    public function subscribir($noticia_id){
        $noticia = Noticia::find($noticia_id);
        $user = User::find(Auth::user()->id);

        if ($user->noticias()->where('noticia_id', $noticia->id)->exists()) {
            return redirect()->back()->with('error', 'Ya estás suscrito a esta noticia.');
        }
        else{
            $user->noticias()->attach($noticia);
        }

        return redirect()->route('noticias.show', ['noticia' => $noticia->id]);


    }




}
