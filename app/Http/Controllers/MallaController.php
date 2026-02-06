<?php

namespace App\Http\Controllers;

use App\Models\Malla;
use App\Models\Facultad;
use App\Models\Carrera;
use Illuminate\Http\Request;

class MallaController extends Controller
{
    public function index()
    {
        $mallas = Malla::with(['facultadRelacion', 'carreraRelacion'])->get();
        return view('malla.index', compact('mallas'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        $carreras = Carrera::all();
        return view('malla.create', compact('facultades', 'carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'facultad' => 'required|exists:facultad,codigo',
            'carrera' => 'required|exists:carrera,codigo',
            'codigo' => 'required|integer',
            'nombre' => 'required|string|max:10'
        ]);

        Malla::create($request->all());
        return redirect()->route('malla.index')->with('success', 'Malla creada');
    }

    public function edit($facultad, $carrera, $codigo)
    {
        $malla = Malla::where('facultad', $facultad)
                      ->where('carrera', $carrera)
                      ->where('codigo', $codigo)
                      ->firstOrFail();

        $facultades = Facultad::all();
        $carreras = Carrera::all();

        return view('malla.edit', compact('malla', 'facultades', 'carreras'));
    }

    public function update(Request $request, $facultad, $carrera, $codigo)
    {
        $request->validate([
            'nombre' => 'required|string|max:10'
        ]);

        $malla = Malla::where('facultad', $facultad)
                      ->where('carrera', $carrera)
                      ->where('codigo', $codigo)
                      ->firstOrFail();

        $malla->update(['nombre' => $request->nombre]);

        return redirect()->route('malla.index')->with('success', 'Malla actualizada');
    }

    public function destroy($facultad, $carrera, $codigo)
{
    $materias = \DB::table('materia')
                    ->where('facultad', $facultad)
                    ->where('carrera', $carrera)
                    ->where('malla', $codigo)
                    ->count();

    if ($materias > 0) {
        return redirect()->route('malla.index')
                         ->with('error', 'No se puede eliminar la malla porque tiene materias registradas.');
    }

    Malla::where('facultad', $facultad)
         ->where('carrera', $carrera)
         ->where('codigo', $codigo)
         ->delete();

    return redirect()->route('malla.index')->with('success', 'Malla eliminada');
}

}
