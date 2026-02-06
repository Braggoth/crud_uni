<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Nuevo Alumno</h1>

<form method="POST" action="{{ route('alumno.store') }}">
@csrf

Código
<input type="number" name="codigo" required>

Cédula
<input type="text" name="cedula" required>

Nombre
<input type="text" name="nombre" required>

Apellido
<input type="text" name="apellido" required>

Correo
<input type="email" name="correo" required>

Carrera
<select name="carrera" required>
    @foreach($carreras as $c)
        <option value="{{ $c->codigo }}">{{ $c->nombre }}</option>
    @endforeach
</select>

<button>Guardar</button>
</form>
