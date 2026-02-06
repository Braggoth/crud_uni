<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function index()
{
    $inscripciones = DB::table('inscripcion')
        ->join('alumno', 'inscripcion.alumno', '=', 'alumno.codigo')
        ->join('materia', 'inscripcion.materia', '=', 'materia.codigo')
        ->select(
            'inscripcion.alumno',
            'inscripcion.materia',
            'inscripcion.periodo',
            'inscripcion.fecha',
            'alumno.nombre as alumno_nombre',
            'materia.nombre as materia_nombre'
        )
        ->get();

    return view('inscripcion.index', compact('inscripciones'));
}


    public function create()
    {
        $alumnos = Alumno::all();
        $materias = Materia::all();
        return view('inscripcion.create', compact('alumnos', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno'  => 'required|exists:alumno,codigo',
            'materia' => 'required|exists:materia,codigo',
            'periodo' => 'required',
            'fecha'   => 'required|date'
        ]);

        DB::table('inscripcion')->insert([
            'alumno'  => $request->alumno,
            'materia' => $request->materia,
            'periodo' => $request->periodo,
            'fecha'   => $request->fecha
        ]);

        return redirect()->route('inscripcion.index')->with('success', 'Inscripción realizada');
    }

    public function edit($alumno, $materia, $periodo)
    {
        $inscripcion = DB::table('inscripcion')
            ->where('alumno', $alumno)
            ->where('materia', $materia)
            ->where('periodo', $periodo)
            ->first();

        $alumnos = Alumno::all();
        $materias = Materia::all();

        return view('inscripcion.edit', compact('inscripcion', 'alumnos', 'materias'));
    }

    public function update(Request $request, $alumno, $materia, $periodo)
    {
        $request->validate([
            'alumno'  => 'required|exists:alumno,codigo',
            'materia' => 'required|exists:materia,codigo',
            'periodo' => 'required',
            'fecha'   => 'required|date'
        ]);

        DB::table('inscripcion')
            ->where('alumno', $alumno)
            ->where('materia', $materia)
            ->where('periodo', $periodo)
            ->update([
                'alumno'  => $request->alumno,
                'materia' => $request->materia,
                'periodo' => $request->periodo,
                'fecha'   => $request->fecha
            ]);

        return redirect()->route('inscripcion.index')->with('success', 'Inscripción actualizada');
    }

    public function destroy($alumno, $materia, $periodo)
    {
        DB::table('inscripcion')
            ->where('alumno', $alumno)
            ->where('materia', $materia)
            ->where('periodo', $periodo)
            ->delete();

        return redirect()->route('inscripcion.index')->with('success', 'Inscripción eliminada');
    }
}
