<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jugadore
 *
 * @property $id
 * @property $nombre
 * @property $numero
 * @property $equipo_id
 * @property $rol_id
 * @property $posicion_id
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Equipo $equipo
 * @property Posicione $posicione
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jugadore extends Model
{
    use SoftDeletes;

    static $rules = [
		'equipo_id' => 'required',
		'rol_id' => 'required',
		'posicion_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','numero','equipo_id','rol_id','posicion_id','activo','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posicione()
    {
        return $this->hasOne('App\Models\Posicione', 'id', 'posicion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'rol_id');
    }
    

}
