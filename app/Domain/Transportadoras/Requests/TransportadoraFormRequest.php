<?php

namespace App\Domain\Transportadoras\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportadoraFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nome' => 'required|string|max:100',
            'endereco' => 'required|string|max:200',
            'email' => 'required|email|max:100|unique:transportadoras,email',
            'telefone' => 'required|string|max:20'
        ];

        if ($this->isMethod('put')) {
            $rules['email'] .= ',' . $this->route('id') . ',id';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da transportadora é obrigatório.',
            'endereco.required' => 'O endereço da transportadora é obrigatório.',
            'email.unique' => 'Este e-mail já está cadastrado para outra transportadora.',
            'telefone.required' => 'O telefone para contato é obrigatório.'
        ];
    }
}
