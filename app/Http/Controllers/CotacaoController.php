<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CotacaoController extends Controller
{
    /**
     * @throws ValidationException
     */

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        /**
         * validate the request
         */
        $this->validate($request, [
            'peso'   => 'required|numeric|min:0.1',
            'cep_destino'      => 'required|regex:/^\d{5}-\d{3}$/',
        ]);

        $cepDestino = str_replace('-', '', $request->input('cep_destino'));
        $peso = $request->input('peso');

        $cotacoes = Cotacao::with('servico.transportadora')
            ->where('cep_inicio', '<=', $cepDestino)
            ->where('cep_final', '>=',$cepDestino)
            ->where('peso_inicial', '<=', $peso)
            ->where('peso_final', '>=', $peso)
            ->orderBy('valor', 'asc')
            ->limit(4)
            ->get()
            ->map(function ($cotacao) {
                return [
                    'servico' => $cotacao->servico->nm_servico,
                    'transportadora' => $cotacao->servico->transportadora->nm_transportadora,
                    'prazo' => $cotacao->prazo_entrega == 1 ? '1 dia útil' : $cotacao->prazo_entrega .' dias úteis',
                    'valor_frete' => $cotacao->valor ,
                ];
            });

        return response()->json(['cotacao' => $cotacoes]);

    }

}
