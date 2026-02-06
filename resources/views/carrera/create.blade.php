<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>

<h1>Nueva Carrera</h1>

<form method="POST" action="{{ route('carrera.store') }}">
@csrf

Código
<input type="number" name="codigo" required>

Nombre
<input type="text" name="nombre" required>

Facultad
<select name="facultad" required>
    @foreach($facultades as $f)
        <option value="{{ $f->codigo }}">{{ $f->nombre }}</option>
    @endforeach
</select>

<button>Guardar</button>
</form>
