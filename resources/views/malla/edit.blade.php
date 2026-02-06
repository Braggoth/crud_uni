<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
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
