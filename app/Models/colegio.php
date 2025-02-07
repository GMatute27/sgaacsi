<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class colegio extends Model
{
    //
    public function resultado(): HasMany
    {
        return $this->hasMany(related: resultado::class, foreignKey: 'idcolegios', localKey: 'idcolegios')->chaperone();
    }
    
}
