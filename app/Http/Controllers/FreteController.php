<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['codigo_rastreio'] = "TESTE123456";
        $dados['status'] = "Em Trânsito";

        $frete = Frete::create($dados);

        return $frete;

    }
}
