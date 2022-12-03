<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Session\Session;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros/librosIndex', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('crear-libro')){
            abort(403);
        }
        $autores = Autor::all();
        return view('libros/librosForm', compact('autores'));
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
            'ISBN' => 'required|min:13|max:13',
            'nombreLibro' => 'required|min:5|max:50',
            'autor_id' => 'required',
            'nombreEditorial' => 'required|min:5|max:50',
            'existenciaPrestamo' => 'required',
            'descripcion' => 'required|min:10|max:3000',
            'categoria' => 'required|min:5|max:100',
            'portada' => 'required|image',
       ]);
        $nombreAutor = $request->nombreAutor;
        $portada = $request->portada;
        $rutaImagen = $portada->store('public');
        $request->merge(['rutaImagen' => $rutaImagen]);
        $libro = Libro::create($request->except('autor_id'));
        /*$autor = Autor::firstOrCreate([
            'autor_id' => $id
        ]);*/
        $autor = Autor::find($request->autor_id);

        $libro->autores()->attach($autor->id);
        session()->flash('message', 'Guardado con exito');
        return redirect('/libro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros/libroShow', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\libro  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $this->authorize('update', $libro);
        $autores = Autor::all();
        return view('libros/libroEdit', compact('libro'), compact('autores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'ISBN' => 'required|min:13|max:13',
            'nombreLibro' => 'required|min:5|max:50',
            'autor_id' => 'required',
            'nombreEditorial' => 'required|min:5|max:50',
            'existenciaPrestamo' => 'required',
            'descripcion' => 'required|min:10',
            'categoria' => 'required|min:5|max:100',
            //'portada' => 'required|image',
       ]);

       /*$libro->ISBN = $request->ISBN;
       $libro->nombreLibro = $request->nombreLibro;
       $libro->nombreEditorial = $request->nombreEditorial;
       $libro->existenciaPrestamo = $request->existenciaPrestamo;
       $libro->descripcion = $request->descripcion;
       $libro->categoria = $request->categoria;

       $nombreAutor = $request->nombreAutor;
       $autor = Autor::firstOrCreate([
            'nombre' => $nombreAutor
        ]);

        $libro->autores()->attach($autor->id); 
        $libro->save();*/

        Libro::where('id', $libro->id)
                ->update($request->except('_token', '_method','autor_id'));
        $libro->autores()->sync($request->autor_id);

        session()->flash('message', 'Actualizacion con exito');
        return redirect('/libro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $this->authorize('delete', $libro);
        $libro->autores()->detach();
        $libro->delete(); 

        session()->flash('message', 'Se elimino con exito');
        return redirect('/libro');
    }
}
