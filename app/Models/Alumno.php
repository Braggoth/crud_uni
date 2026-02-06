<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'direccion',
        'pension',
        'carrera'
    ];

    public function carreraRelacion()
    {
        return $this->belongsTo(Carrera::class, 'carrera', 'codigo');
    }
    public function materias()
{
    return $this->belongsToMany(Materia::class, 'inscripcion', 'alumno', 'materia')
                ->withPivot('id')
                ->withTimestamps();
}
}
