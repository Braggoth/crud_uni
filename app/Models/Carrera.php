<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['codigo', 'nombre', 'facultad'];

    public function facultadRelacion()
    {
        return $this->belongsTo(Facultad::class, 'facultad', 'codigo');
    }
}
