<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
<h1>Facultades</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('facultad.create') }}">+ Nueva Facultad</a>

<table>
<tr>
    <th>Código</th>
    <th>Nombre</th>
    <th>Acciones</th>
</tr>

@foreach($facultades as $f)
<tr>
    <td>{{ $f->codigo }}</td>
    <td>{{ $f->nombre }}</td>
    <td>
        <a href="{{ route('facultad.edit', $f->codigo) }}">Editar</a>
        <form action="{{ route('facultad.destroy', $f->codigo) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
    </td>
</tr>
@endforeach
</table>
