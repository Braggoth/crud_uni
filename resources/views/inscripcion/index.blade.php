<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Inscripciones</h1>

@if(session('success'))
<div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('inscripcion.create') }}" class="btn btn-crear">+ Nueva Inscripción</a>

<table>
<tr>
    <th>Alumno</th>
    <th>Materia</th>
    <th>Periodo</th>
    <th>Acción</th>
</tr>

@foreach($inscripciones as $i)
<tr>
    <td>{{ $i->alumno_nombre ?? 'Alumno eliminado' }}</td>
    <td>{{ $i->materia_nombre ?? 'Materia eliminada' }}</td>
    <td>{{ $i->periodo }}</td>
    <td>
        <a href="{{ route('inscripcion.edit', [$i->alumno, $i->materia, $i->periodo]) }}" class="btn btn-editar">
            Editar
        </a>

        <form action="{{ route('inscripcion.destroy', [$i->alumno, $i->materia, $i->periodo]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-eliminar">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach

</table>
