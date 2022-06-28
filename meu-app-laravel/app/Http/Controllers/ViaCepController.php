<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViaCepController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cep')) {
            return redirect()->route('viacep.show', ['cep' => $request->cep]);
        }

        return view('viacep.index');
        // $cep = $request->input('cep');
        // $viaCep = new \ViaCep\ViaCep();
        // $endereco = $viaCep->get($cep);
        // dd($endereco);
    }

    public function show($cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/")->json();

        return $response;
    }
}
