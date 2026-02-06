<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<h1>Editar Malla</h1>

<form method="POST" action="{{ route('malla.update', [$malla->facultad, $malla->carrera, $malla->codigo]) }}">
@csrf @method('PUT')

Facultad
<input type="text" value="{{ $malla->facultadRelacion->nombre }}" disabled>

Carrera
<input type="text" value="{{ $malla->carreraRelacion->nombre }}" disabled>

Código
<input type="number" value="{{ $malla->codigo }}" disabled>

Nombre
<input type="text" name="nombre" value="{{ $malla->nombre }}" required>

<button>Actualizar</button>
</form>
