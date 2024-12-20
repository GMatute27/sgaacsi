<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class indicadores extends Model
{
    //
    public function dimension(): BelongsTo
    {
        return $this->belongsTo(dimension::class);
    }
    protected $fillable = ['nombre', 'descripcion'];
}
