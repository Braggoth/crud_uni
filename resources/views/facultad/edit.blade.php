<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">}
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
<h1>Editar Facultad</h1>

<form method="POST" action="{{ route('facultad.update', $facultad->codigo) }}">
@csrf @method('PUT')

Código
<input type="number" value="{{ $facultad->codigo }}" disabled>

Nombre
<input type="text" name="nombre" value="{{ $facultad->nombre }}" required>

<button>Actualizar</button>
</form>
