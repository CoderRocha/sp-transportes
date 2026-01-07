<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request)
    {

        $cliente = Cliente::create($request->all());

        return $cliente;
    }
}
