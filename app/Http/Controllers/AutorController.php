<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        return view('autores/autorIndex', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('crear-autor')){
            abort(403);
        } 
       return view('autores/autorForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:50',
            'foto' => 'required|image',
        ]);

        $nombre = $request->nombre;
        $portada = $request->foto;
        $rutaFoto = $portada->store('public');
        $request->merge(['rutaFoto' => $rutaImagen]);
        $libro = Autor::create($request->all());

        
        session()->flash('message', 'Guardado con exito');
        return redirect('/autor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        return view('autores/autorShow', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        $this->authorize('update', $autor);
        return view('autores/autorEdit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:50',
            'foto' => 'required|image',
        ]);

        $autor->nombre = $request->nombre;
        /*$portada = $request->foto;
        $rutaFoto = $portada->store('public');
        $request->merge(['rutaFoto' => $rutaImagen]);*/
        $autor->save();
        session()->flash('message', 'Actualizacion con exito');
        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $this->authorize('update', $autor);
        $autor->libros()->detach();
        $autor->delete();

        session()->flash('message', 'Se elimino con exito');
        return redirect('/autor');
    }
}
