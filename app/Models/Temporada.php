<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['temporada', 'fecha_inicio', 'fecha_fin'];

    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    public function partidosEnTemporada()
    {
        return Partido::whereBetween('fecha', [$this->fecha_inicio, $this->fecha_fin])->get();
    }
}
