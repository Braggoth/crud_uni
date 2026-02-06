@if ($errors->any())


@foreach ($errors->all() as $error)
{{ $error }}
@endforeach


@endif

<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

<label>Alumno</label>
<select name="alumno" required>
    @foreach($alumnos as $a)
        <option value="{{ $a->codigo }}" {{ $inscripcion->alumno == $a->codigo ? 'selected' : '' }}>
            {{ $a->nombre }}
        </option>
    @endforeach
</select>

<label>Materia</label>
<select name="materia" required>
    @foreach($materias as $m)
        <option value="{{ $m->codigo }}" {{ $inscripcion->materia == $m->codigo ? 'selected' : '' }}>
            {{ $m->nombre }}
        </option>
    @endforeach
</select>

<label>Periodo</label>
<input type="text" name="periodo" value="{{ $inscripcion->periodo }}" required>

<label>Fecha</label>
<input type="date" name="fecha" value="{{ $inscripcion->fecha }}" required>

<br><br>
<button type="submit" class="btn btn-editar">Actualizar</button>
<a href="{{ route('inscripcion.index') }}" class="btn">Cancelar</a>