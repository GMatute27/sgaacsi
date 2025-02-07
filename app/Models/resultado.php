<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class resultado extends Model
{
    //
    public function respuesta(): BelongsTo
    {
        return $this->belongsTo(respuesta::class);
    }
    public function colegio(): BelongsTo
    {
        return $this->belongsTo(related: colegio::class, foreignKey: 'idcolegios', ownerKey: 'idcolegios');
    }
    public function indicador(): BelongsTo
    {
        return $this->belongsTo(indicadores::class, foreignKey: 'idindicadores', ownerKey: 'idindicadores');
    }
    

    protected $fillable = ['resultado', 'valor', 'idrespuesta'];
}
