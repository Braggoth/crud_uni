<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
<h1>Editar Materia</h1>

<form method="POST" action="{{ route('materia.update', $materia->codigo) }}">
@csrf @method('PUT')

Código
<input type="number" value="{{ $materia->codigo }}" disabled>

Nombre
<input type="text" name="nombre" value="{{ $materia->nombre }}" required>

Facultad
<select name="facultad" required>
@foreach($facultades as $f)
<option value="{{ $f->codigo }}" {{ $materia->facultad == $f->codigo ? 'selected' : '' }}>
{{ $f->nombre }}
</option>
@endforeach
</select>

Carrera
<select name="carrera" required>
@foreach($carreras as $c)
<option value="{{ $c->codigo }}" {{ $materia->carrera == $c->codigo ? 'selected' : '' }}>
{{ $c->nombre }}
</option>
@endforeach
</select>

Malla
<select name="malla" required>
@foreach($mallas as $m)
<option value="{{ $m->codigo }}" {{ $materia->malla == $m->codigo ? 'selected' : '' }}>
{{ $m->nombre }}
</option>
@endforeach
</select>

<button>Actualizar</button>
</form>
