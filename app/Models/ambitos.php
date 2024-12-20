<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ambitos extends Model
{
    //
    public function dimension(): HasMany
    {
        return $this->hasMany(related: dimension::class, foreignKey: 'idambito', localKey: 'idambito')->chaperone();
    }
    protected $fillable = ['nombre', 'descripcion'];
    
}
