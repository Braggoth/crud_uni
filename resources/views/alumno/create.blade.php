<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
    <title>Nuevo Alumno</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

<header>
    <h1>Nuevo Alumno</h1>
</header>

<form method="POST" action="{{ route('alumno.store') }}">
    @csrf

    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}" required>

    <label>Código</label>
    <input type="number" name="codigo" value="{{ old('codigo') }}" required>

    <label>Dirección</label>
    <input type="text" name="direccion" value="{{ old('direccion') }}" required>

    <label>Pensión</label>
    <input type="number" name="pension" value="{{ old('pension') }}" required>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
