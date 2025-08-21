<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patrocinadore
 *
 * @property $id
 * @property $nombre
 * @property $tipo_patrocinador_id
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property PatrocinadorTipo $patrocinadorTipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patrocinadore extends Model
{
    
    static $rules = [
		'tipo_patrocinador_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','tipo_patrocinador_id','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patrocinadorTipo()
    {
        return $this->hasOne('App\Models\PatrocinadorTipo', 'id', 'tipo_patrocinador_id');
    }
    

    //Funciones para mostrar los patrocinadores directamente en la plantilla blade del footer, sin pasar por el controlador
    public function patrocinadoresPrincipales(){
        $patrocinadoresPrincipales = $this->where('tipo_patrocinador_id',  3)->get();
        return $patrocinadoresPrincipales;
    } 
    public function patrocinadoresInstitucionales(){
        $patrocinadoresInstitucionales = $this->where('tipo_patrocinador_id',  4)->get();
        return $patrocinadoresInstitucionales;
    } 
    public function patrocinadoresNormales(){
        $patrocinadoresNormales = $this->where('tipo_patrocinador_id',  5)->get();
        return $patrocinadoresNormales;
    } 

    
}
