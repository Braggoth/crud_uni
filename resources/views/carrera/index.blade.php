<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Carreras</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('carrera.create') }}">+ Nueva Carrera</a>

<table>
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Facultad</th>
    <th>Acciones</th>
</tr>

@foreach($carreras as $c)
<tr>
    <td>{{ $c->codigo }}</td>
    <td>{{ $c->nombre }}</td>
    <td>{{ $c->facultadRelacion->nombre }}</td>
    <td>
        <a href="{{ route('carrera.edit', $c->codigo) }}">Editar</a>
        <form action="{{ route('carrera.destroy', $c->codigo) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>
