<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscricaoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nomeCompleto'=>'required|string|max:255',
            'dataNascimento'=>'required',
            'pai'=>'required|string|max:255',
            'mae'=>'required|string|max:255',
            'sexo'=>'required',
            'escolaridade'=>'required|string|max:60',
            'identidade'=>'required|numeric',
            'cpf'=>'sometimes|required|cpf|unique:inscricoes',
            'cep'=>'required',
            'estado'=>'required|string|max:2',
            'cidade'=>'required|string|max:40',
            'endereco'=>'required|string|max:60',
            'bairro'=>'required|string|max:40',
            'numero'=>'required|numeric',
            'email'=>'required|string|email|max:255',
            'telefone'=>'required' 
        ];
    }
}
