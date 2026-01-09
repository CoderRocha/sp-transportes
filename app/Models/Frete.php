<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\FreteStatus;

class Frete extends Model
{
    protected $fillable = ['origem', 'destino', 'codigo_rastreio', 'status', 'remetente_id', 'destinatario_id'];

    protected $casts = [
        'status' => FreteStatus::class,
    ];

    public function etapas(): HasMany
    {
        return $this->hasMany(Etapa::class);
    }

    public function remetente()
    {
        return $this->belongsTo(Cliente::class, 'remetente_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(Cliente::class, 'destinatario_id');
    }
}
