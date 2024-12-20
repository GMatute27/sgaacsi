<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class dimension extends Model
{
    //
    public function ambitos(): BelongsTo
    {
        return $this->belongsTo(ambitos::class);
    }
    public function indicadores(): HasMany
    {
        return $this->hasMany(related: indicadores::class, foreignKey: 'idindicadores', localKey: 'iddimension')->chaperone();
    }
    protected $fillable = ['nombre', 'descripcion','ambitos_id_ambito'];
}
