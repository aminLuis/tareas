<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tiempo extends Model
{
    /**
     * Get the cliente associated with the ventas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    //Relación de muchos a uno, un tiempo sólo puede tener una actividad 
    public function Actividad(): HasOne
    {
        return $this->hasOne(actividad::class);
    }
}
