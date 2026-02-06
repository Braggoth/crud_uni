<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malla extends Model
{
    protected $table = 'malla';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null; // porque es clave compuesta

    protected $fillable = ['facultad', 'carrera', 'codigo', 'nombre'];

    public function facultadRelacion()
    {
        return $this->belongsTo(Facultad::class, 'facultad', 'codigo');
    }

    public function carreraRelacion()
    {
        return $this->belongsTo(Carrera::class, 'carrera', 'codigo');
    }
}
