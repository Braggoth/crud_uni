<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Editar Alumno</h1>

<form method="POST" action="{{ route('alumno.update', $alumno->codigo) }}">
@csrf @method('PUT')

Código
<input type="number" value="{{ $alumno->codigo }}" disabled>

Cédula
<input type="text" name="cedula" value="{{ $alumno->cedula }}" required>

Nombre
<input type="text" name="nombre" value="{{ $alumno->nombre }}" required>

Apellido
<input type="text" name="apellido" value="{{ $alumno->apellido }}" required>

Correo
<input type="email" name="correo" value="{{ $alumno->correo }}" required>

Carrera
<select name="carrera" required>
    @foreach($carreras as $c)
        <option value="{{ $c->codigo }}" {{ $alumno->carrera == $c->codigo ? 'selected' : '' }}>
            {{ $c->nombre }}
        </option>
    @endforeach
</select>

<button>Actualizar</button>
</form>
