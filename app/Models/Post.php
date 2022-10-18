<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property $id
 * @property $imagen_url
 * @property $Contenido
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{
    use HasFactory;


    Protected $allowIncluded = ['Users','images'];
    protected $allowFilter = ['Contenido','id'];
    protected $allowSort = ['id', 'Contenido','users_id'];

protected $guarded=[];

    static $rules = [

		'Contenido' => 'required',
		'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Contenido','users_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Users()
    {
        return $this->belongsTo('App\Models\User');
    }

public function images(){

  return $this->morphMany('App\Models\Image','imageable');

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

            //!$query->where($filter, $value);
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


