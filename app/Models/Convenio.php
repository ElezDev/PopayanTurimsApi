<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Convenio
 *
 * @property $id
 * @property $fecha
 * @property $direccion
 * @property $telefono
 * @property $correo
 * @property $tipconvenios_id
 * @property $lugares_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Lugar $lugar
 * @property Tipconvenio $tipconvenio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Convenio extends Model
{
    Protected $allowIncluded = ['lugars','tipconvenio'];
    protected $allowFilter = ['fecha','id'];
    protected $allowSort = ['id', 'nombre'];

    use HasFactory;

    static $rules = [
		'fecha' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'tipconvenios_id' => 'required',
		'lugares_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','direccion','telefono','correo','tipconvenios_id','lugares_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lugars()
    {
        return $this->belongsTo('App\Models\Lugar', 'id', 'lugares_id');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipconvenio()
    {
        return $this->hasMany('App\Models\Tipconvenio', 'id', 'tipconvenios_id');
    }



    public function scopeIncluded(Builder $query)
    {

        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }
        $relations = explode(',', request('included')); //['posts','relation2']
        //return $relations;

        $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
       // return $allowIncluded;
        foreach ($relations as $key => $relationship) { //recorremos el array de $relations y los guardamos en una variable llamada relationship

            if (!$allowIncluded->contains($relationship)) { // si un elemento de la variable allowIncluded no esta dentro de $relationship
                unset($relations[$key]);
            }
        } //
        // return $relations;
        $query->with($relations); //se ejecuta el query con lo que tiene $relations y que son los valores permitidos
    }                                    // por la variable allowIncluded
    //////////////////////




    public function scopeFilter(Builder $query)
    {

        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {

                //$query->where($filter, $value);
                $query->where($filter,'LIKE','%'.$value.'%');
            }
        }
    }


    public function scopeSort(Builder $query)
    {

        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',',request('sort')) ;
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField,'asc');
               }
        }
    }


}



