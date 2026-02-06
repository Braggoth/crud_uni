<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Universidad</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="dashboard-container">
    <h1 class="titulo">Sistema de Gestión Universitaria</h1>

    <div class="grid-modulos">
        <a href="{{ route('facultad.index') }}" class="card">Facultades</a>
        <a href="{{ route('carrera.index') }}" class="card">Carreras</a>
        <a href="{{ route('malla.index') }}" class="card">Mallas</a>
        <a href="{{ route('materia.index') }}" class="card">Materias</a>
        <a href="{{ route('alumno.index') }}" class="card">Alumnos</a>
        <a href="{{ route('inscripcion.index') }}" class="card">Inscripciones</a>
    </div>
</div>

</body>
</html>
