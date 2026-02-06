<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
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
