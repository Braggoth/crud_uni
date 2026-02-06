<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<a href="{{ route('dashboard') }}" style="text-decoration:none; font-size:20px; margin-right:15px;">INICIO</a>
<h1>Nueva Facultad</h1>

<form method="POST" action="{{ route('facultad.store') }}">
@csrf
Código
<input type="number" name="codigo" required>

Nombre
<input type="text" name="nombre" required>

<button>Guardar</button>
</form>
