<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Nueva Malla</h1>

<form method="POST" action="{{ route('malla.store') }}">
@csrf

Facultad
<select name="facultad" required>
@foreach($facultades as $f)
<option value="{{ $f->codigo }}">{{ $f->nombre }}</option>
@endforeach
</select>

Carrera
<select name="carrera" required>
@foreach($carreras as $c)
<option value="{{ $c->codigo }}">{{ $c->nombre }}</option>
@endforeach
</select>

Código
<input type="number" name="codigo" required>

Nombre
<input type="text" name="nombre" required>

<button>Guardar</button>
</form>
