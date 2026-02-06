<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Materias</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('materia.create') }}">+ Nueva Materia</a>

<table>
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Facultad</th>
    <th>Carrera</th>
    <th>Malla</th>
    <th>Acciones</th>
</tr>

@foreach($materias as $m)
<tr>
    <td>{{ $m->codigo }}</td>
    <td>{{ $m->nombre }}</td>
    <td>{{ $m->facultadRelacion->nombre }}</td>
    <td>{{ $m->carreraRelacion->nombre }}</td>
    <td>{{ $m->mallaRelacion->nombre }}</td>
    <td>
        <a href="{{ route('materia.edit', $m->codigo) }}">Editar</a>
        <form action="{{ route('materia.destroy', $m->codigo) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>
