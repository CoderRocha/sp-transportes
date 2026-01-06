<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\FreteStatus;

class Frete extends Model
{
    protected $casts = [
        'status' => FreteStatus::class,
    ];

    public function etapas(): HasMany
    {
        return $this->hasMany(Etapa::class);
    }
}
