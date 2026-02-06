<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['codigo', 'nombre', 'facultad', 'carrera', 'malla'];

    public function facultadRelacion()
    {
        return $this->belongsTo(Facultad::class, 'facultad', 'codigo');
    }

    public function carreraRelacion()
    {
        return $this->belongsTo(Carrera::class, 'carrera', 'codigo');
    }

    public function mallaRelacion()
    {
        return $this->belongsTo(Malla::class, 'malla', 'codigo');
    }
    public function alumnos()
{
    return $this->belongsToMany(Alumno::class, 'inscripcion', 'materia', 'alumno')
                ->withPivot('id')
                ->withTimestamps();
}

}
