<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lugar
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $horarios
 * @property $descripcion
 * @property $foto_url
 * @property $tipolugar_id
 * @property $rutas_id
 * @property $gastronomia_id
 * @property $evento_id
 * @property $calificasiones_id
 * @property $servicios_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificasione $calificasione
 * @property Convenio[] $convenios
 * @property Evento $evento
 * @property Gastronomia $gastronomia
 * @property Ruta $ruta
 * @property Servicio $servicio
 * @property Tipolugar $tipolugar
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lugar extends Model
{



    Protected $allowIncluded = ['Calificasione','convenios','evento','gastronomia','ruta','servicio','tipolugar','images', 'servicio.tiposervicio'];
    protected $allowFilter = ['nombre','id'];
    protected $allowSort = ['id', 'nombre'];




    use HasFactory;


    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'horarios' => 'required',
		'descripcion' => 'required',
        'foto_url' => 'required',

		'tipolugar_id' => 'required',
		'ruta_id' => 'required',
		'gastronomia_id' => 'required',
		'evento_id' => 'required',
		'calificasione_id' => 'required',
		'servicio_id' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','horarios','descripcion','foto_url', 'tipolugar_id','ruta_id','gastronomia_id','evento_id','calificasione_id','servicio_id' ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Calificasione()
    {
        return $this->belongsTo(Calificasione::class);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function convenios()
    {
        return $this->hasMany('App\Models\Convenio', 'lugares_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evento()
    {
        return $this->hasMany('App\Models\Evento', 'id', 'evento_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gastronomia()
    {
        return $this->belongsTo('App\Models\Gastronomia', 'id', 'gastronomia_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }


    public function tipolugar()
    {
        return $this->belongsTo(Tipolugar::class);
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






