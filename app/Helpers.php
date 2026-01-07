<?php

namespace App;

use App\Models\Frete;
use Illuminate\Support\Str;

class Helpers {
    static public function geraCodigoRastreioUnico(): string
    {
        do {
            $codigo = Str::upper(Str::random(8));

            $existeFrete = Frete::where('codigo_rastreio', $codigo)->exists();
        } while ($existeFrete);

        return $codigo;
    } 
}