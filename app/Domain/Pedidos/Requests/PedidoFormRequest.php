<?php

namespace App\Domain\Pedidos\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'vendedor_id' => 'required|uuid|exists:vendedores,id',
            'produto' => 'required|string|max:100',
            'quantidade' => 'required|integer|min:1',
            'valor_total' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'vendedor_id.required' => 'O vendedor é obrigatório.',
            'vendedor_id.exists' => 'O vendedor selecionado não existe.',
            'produto.required' => 'A descrição do produto é obrigatória.',
            'quantidade.min' => 'A quantidade mínima é 1.',
            'valor_total.min' => 'O valor total não pode ser negativo.'
        ];
    }
}
