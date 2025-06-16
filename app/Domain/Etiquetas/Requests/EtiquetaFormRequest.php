<?php

namespace App\Domain\Etiquetas\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtiquetaFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'vendedor_id' => 'required|uuid|exists:vendedores,id',
            'transportadora_id' => 'required|uuid|exists:transportadoras,id',
            'pedido_id' => 'required|uuid|exists:pedidos,id',
            'data_envio' => 'required|date|after_or_equal:today'
        ];
    }

    public function messages()
    {
        return [
            'vendedor_id.exists' => 'O vendedor selecionado não existe.',
            'transportadora_id.exists' => 'A transportadora selecionada não existe.',
            'pedido_id.exists' => 'O pedido selecionado não existe.',
            'data_envio.after_or_equal' => 'A data de envio não pode ser retroativa.'
        ];
    }
}
