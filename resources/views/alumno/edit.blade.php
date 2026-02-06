<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
        <a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>

    <title>Editar Alumno</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

<header>
    <h1>Editar Alumno</h1>
</header>

<form method="POST" action="{{ route('alumno.update', $alumno->codigo) }}">
    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ $alumno->nombre }}" required>

    <label>Código</label>
    <input type="number" name="codigo" value="{{ $alumno->codigo }}" required>

    <label>Dirección</label>
    <input type="text" name="direccion" value="{{ $alumno->direccion }}" required>

    <label>Pensión</label>
    <input type="number" name="pension" value="{{ $alumno->pension }}" required>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>
