<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class indicadores extends Model
{
    //
    public function dimension(): BelongsTo
    {
        return $this->belongsTo(related: dimension::class, foreignKey: 'iddimension', ownerKey: 'iddimension');
    }
    public function respuesta(): HasMany
    {
        return $this->hasMany(related: respuesta::class, foreignKey: 'idindicadores', localKey: 'idindicadores')->chaperone();
    }
    public function comentarios(): HasMany
    {
        return $this->hasMany(related: comentarios::class, foreignKey: 'idindicadores', localKey: 'idindicadores')->chaperone();
    }
    protected $fillable = ['nombre', 'descripcion','idimension'];
}
