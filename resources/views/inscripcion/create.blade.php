<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Nueva Inscripción</h1>

<form method="POST" action="{{ route('inscripcion.store') }}">
@csrf

Alumno
<select name="alumno" required>
    @foreach($alumnos as $a)
        <option value="{{ $a->codigo }}">{{ $a->nombre }}</option>
    @endforeach
</select>

Materia
<select name="materia" required>
    @foreach($materias as $m)
        <option value="{{ $m->codigo }}">{{ $m->nombre }}</option>
    @endforeach
</select>

<button>Inscribir</button>
</form>
