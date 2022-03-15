<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class actividad extends Model
{
    /**
    * Get all of the comments for the cliente
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */

  //Relación de uno a muchos, una actividad puede tener varios tiempos
   public function Tiempos(): HasMany
   {
       return $this->hasMany(tiempo::class, 'id_actividad');
   }
}
