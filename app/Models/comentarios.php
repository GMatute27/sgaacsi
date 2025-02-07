<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comentarios extends Model
{
    //
    protected $table = 'comentarios';
    protected $primaryKey = 'idcomentarios';
    protected $fillable = ['idresultado','idusers','comentario'];
    public function indicadores()
    {
        return $this->belongsTo(indicadores::class, 'idindicadores');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'idusers', 'id');
    }
    public $timestamps = true;
}
