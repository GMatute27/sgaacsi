<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class respuesta extends Model
{
    //
    public function indicadores(): BelongsTo
    {
        return $this->belongsTo(indicadores::class);
    }
    public function resultado(): HasMany
    {
        return $this->hasMany(related: resultado::class, foreignKey: 'idrespuesta', localKey: 'id')->chaperone();
    }
    
    protected $fillable = ['respuesta', 'valor', 'idindicadores'];
}