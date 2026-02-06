<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
        <a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>

    <title>Alumnos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

<header>
    <h1>Alumnos</h1>
</header>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<nav>
    <a href="{{ route('alumno.create') }}">+ Nuevo Alumno</a>
</nav>

<table>
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Pensión</th>
        <th>Acciones</th>
    </tr>

    @foreach($alumnos as $a)
    <tr>
        <td>{{ $a->codigo }}</td>
        <td>{{ $a->nombre }}</td>
        <td>{{ $a->direccion }}</td>
        <td>{{ $a->pension }}</td>
        <td>
            <a href="{{ route('alumno.edit', $a->codigo) }}">Editar</a>
            <form action="{{ route('alumno.destroy', $a->codigo) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button>Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
