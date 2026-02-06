<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Mallas</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('malla.create') }}">+ Nueva Malla</a>

<table>
<tr>
    <th>Facultad</th>
    <th>Carrera</th>
    <th>Código</th>
    <th>Nombre</th>
    <th>Acciones</th>
</tr>

@foreach($mallas as $m)
<tr>
    <td>{{ $m->facultadRelacion->nombre }}</td>
    <td>{{ $m->carreraRelacion->nombre }}</td>
    <td>{{ $m->codigo }}</td>
    <td>{{ $m->nombre }}</td>
    <td>
        <a href="{{ route('malla.edit', [$m->facultad, $m->carrera, $m->codigo]) }}">Editar</a>
        <form action="{{ route('malla.destroy', [$m->facultad, $m->carrera, $m->codigo]) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>
