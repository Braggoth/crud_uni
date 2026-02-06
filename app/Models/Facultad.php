<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['codigo', 'nombre'];

    // Relación: una facultad tiene muchas carreras
    public function carreras()
    {
        return $this->hasMany(Carrera::class, 'facultad', 'codigo');
    }
}
