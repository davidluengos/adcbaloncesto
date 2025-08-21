<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PatrocinadorTipo
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Patrocinadore[] $patrocinadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PatrocinadorTipo extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patrocinadores()
    {
        return $this->hasMany('App\Models\Patrocinadore', 'tipo_patrocinador_id', 'id');
    }
    

}
