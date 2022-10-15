<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gastronomia
 *
 * @property $id
 * @property $ubicasion
 * @property $descripcion
 * @property $horarios
 * @property $tipoplato_id
 *
 * @property Lugar[] $lugars
 * @property Tipoplato $tipoplato
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gastronomia extends Model
{

    use HasFactory;

    Protected $allowIncluded = ['lugars','tipoplato'];
    protected $allowFilter = ['Ubicasion','id'];
    protected $allowSort = ['id', 'ubucasion'];

    static $rules = [
		'ubicacion' => 'required',
		'descripcion' => 'required',
		'horarios' => 'required',
		'tipoplato_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * !Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ubicacion','descripcion','horarios','tipoplato_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lugars()
    {
        return $this->hasMany(lugar::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoplato()
    {
        return $this->hasMany('App\Models\Tipoplato', 'id', 'tipoplato_id');
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


