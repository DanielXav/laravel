<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'nome' => ['required', 'min:3'],
                'telefone' => ['required', 'min:8'],
                'cpf' => [
                    'required',
                    Rule::unique('clientes', 'cpf'),
                ],
                'email' => ['required'],
            ];
        }

        return [
            'nome' => ['required', 'min:3'],
            'telefone' => ['required', 'min:8'],
            'cpf' => [],
            'email' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'nome.min' => 'O campo nome precisa ter pelo menos :min caracteres',
            'telefone.min' => 'O campo telefone precisa ter pelo menos :min caracteres'
        ];
    }
}
