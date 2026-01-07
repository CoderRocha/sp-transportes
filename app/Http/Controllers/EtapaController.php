<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEtapaRequest;
use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    public function Store(StoreEtapaRequest $request)
    {
        $etapa = Etapa::create($request->all());

        return $etapa;
    }
}
