<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Alumnos</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('alumno.create') }}">+ Nuevo Alumno</a>

<table>
<tr>
    <th>Código</th>
    <th>Cédula</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Correo</th>
    <th>Carrera</th>
    <th>Acciones</th>
</tr>

@foreach($alumnos as $a)
<tr>
    <td>{{ $a->codigo }}</td>
    <td>{{ $a->cedula }}</td>
    <td>{{ $a->nombre }}</td>
    <td>{{ $a->apellido }}</td>
    <td>{{ $a->correo }}</td>
    <td>{{ $a->carreraRelacion->nombre ?? 'Sin carrera' }}</td>
    <td>
        <a href="{{ route('alumno.edit', $a->codigo) }}">Editar</a>
        <form action="{{ route('alumno.destroy', $a->codigo) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>
