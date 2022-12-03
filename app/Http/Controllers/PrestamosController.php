<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PrestamosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->email == 'admin@admin.com')
        {
            $prestamos = Prestamo::all();
            return view('prestamos/prestamosIndex', compact('prestamos'));
        }
        else 
        {
            $prestamos = Prestamo::where('user_id', Auth::id())->get();
            return view('prestamos/prestamosIndex', compact('prestamos'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros = Libro::all();
        return view('prestamos/prestamoForm', compact('libros'));
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
            'libro_id' => 'required',
            'fechaPrestamo' => 'required',
            'fechaDevolucion' => 'required',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        $prestamo = Prestamo::create($request->all());
        
        $libro = Libro::find($request->libro_id);
        $libro->decrement('existenciaPrestamo');
        $libro->save();
        
        session()->flash('message', 'Libro solicitado con Exito!');
        return redirect('/prestamos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        return view('prestamos/prestamoShow', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        $this->authorize('update', $prestamo);
        $libros = Libro::all();
        return view('prestamos/prestamoEdit', compact('prestamo'), compact('libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'fechaPrestamo' => 'required',
            'fechaDevolucion' => 'required',
            'libro_id' => 'required',
        ]);

        $prestamo->fechaPrestamo = $request->fechaPrestamo;
        $prestamo->fechaDevolucion = $request->fechaDevolucion;
        $prestamo->libro_id = $request->libro_id;
        $prestamo->save();
        session()->flash('message', 'Prestamo editado con Exito!');
        return redirect('/prestamos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        $this->authorize('delete', $prestamo);
        $prestamo->delete();
        session()->flash('message', 'Prestamo eliminado con Exito!');
        return redirect('/prestamos');
    }

    public function reciboDelPrestamo(Prestamo $prestamo)
    {   
        $pdf = Pdf::loadView('prestamos/pdfPrestamo', compact('prestamo')); 
        return $pdf->stream();
    }

    public function updateDevuelto(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'devuelto' => 'required',
        ]);

        $prestamo->devuelto = $request->boolean('devuelto');
        $prestamo->save();
        $libro = Libro::find($prestamo->libro->id);
        $libro->increment('existenciaPrestamo');
        $libro->save();
        session()->flash('message', 'Prestamo editado con Exito!');
        return redirect('/prestamos');
    }
}
