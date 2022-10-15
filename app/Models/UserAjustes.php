<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjustesModel extends Model
{
    use HasFactory;
    public function images(){
        return $this->morphMany('App\Models\Image','imageable');
    
      }
}
