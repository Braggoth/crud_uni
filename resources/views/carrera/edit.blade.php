<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
<h1>Editar Carrera</h1>

<form method="POST" action="{{ route('carrera.update', $carrera->codigo) }}">
@csrf @method('PUT')

Código
<input type="number" value="{{ $carrera->codigo }}" disabled>

Nombre
<input type="text" name="nombre" value="{{ $carrera->nombre }}" required>

Facultad
<select name="facultad" required>
    @foreach($facultades as $f)
        <option value="{{ $f->codigo }}" {{ $carrera->facultad == $f->codigo ? 'selected' : '' }}>
            {{ $f->nombre }}
        </option>
    @endforeach
</select>

<button>Actualizar</button>
</form>
