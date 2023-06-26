<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiantes;
use App\Models\Carreras;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiantes::select('estudiantes.id','nombre','edad','id_carrera','carrera')
        ->join('carreras','carreras.id','=','estudiantes.id_carrera')->get();
        $carreras = Carreras::all();
        return view('estudiantes',compact('estudiantes','carreras'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiantes($request->input());
        $estudiante->saveOrFail();
        return redirect('estudiantes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiante = Estudiantes::find($id);
        $carreras = Carreras::all();
        return view('editarEstudiante',compact('estudiante','carreras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estudiante = Estudiantes::find($id);
        $estudiante->fill($request->input())->saveOrFail();
        return redirect('estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiantes::find($id);
        $estudiante->delete();
        return redirect('estudiantes');
    }
}
