<?php

namespace App\Domain\Vendedores\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorFormRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'nome' => 'required|string|max:100',
            'endereco' => 'required|string|max:200',
            'email' => 'required|email|max:100|unique:vendedores,email',
            'telefone' => 'required|string|max:20'
        ];

        // Na atualização, ignorar unique para o próprio registro
        if ($this->isMethod('put')) {
            $rules['email'] .= ',' . $this->route('id') . ',id';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 100 caracteres.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'telefone.required' => 'O campo telefone é obrigatório.'
        ];
    }
}
