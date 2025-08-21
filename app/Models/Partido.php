<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partido
 *
 * @property $id
 * @property $fecha
 * @property $equipo_local_id
 * @property $equipo_visitante_id
 * @property $categoria_id
 * @property $pabellon
 * @property $localidad
 * @property $comentario
 * @property $resultado_local
 * @property $resultado_visitante
 * @property $alqazeres_es_local
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Categoria $categoria
 * @property Equipo $equipo
 * @property Equipo $equipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Partido extends Model
{
    use SoftDeletes;

    static $rules = [
		'equipo_local_id' => 'required',
		'equipo_visitante_id' => 'required',
		'categoria_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','equipo_local_id','equipo_visitante_id','categoria_id','pabellon','localidad','comentario','resultado_local','resultado_visitante','alqazeres_es_local'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipoVisitante()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_visitante_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipoLocal()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_local_id');
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
    

}
