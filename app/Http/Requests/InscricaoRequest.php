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

    public function messages()
    {
        return [
            'empresa.required'=>'Informe o nome da empresa',
            'funcao.required'=>'Informe a função que desempenhou na empresa',
            'atividade.required'=>'Informe a atividade exercida',
            'dataInE.required'=>'Informe o dia que iniciou os trabalhos na empresa',
            'dataTermE.required'=>'Informe o dia que deixou os trabalhos da empresa',

            'instituicao.required'=>'Informe a instituição no qual você se especializou(Cursos)',
            'curso.required'=>'Informe os Cursos Profissionalizantes',
            'dataInI.required'=>'Informe o dia do inicio do curso ',
            'dataTermI.required'=>'Informe o dia do fim do curso',
            'cargaHora.required'=>'Informe a carga Horária',

            'cargo_id.required'=>'Informe o cargo do seletivo'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //dados pessoais
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
            'telefone'=>'required',
            //qualificacao
            'instituicao'=>'string|max:80',
            'curso'=>'string|max:80',
            'cargaHora'=>'numeric',
            'dataInI'=>'',
            'dataTermI'=>'',
            //empresa
            'empresa'=>'string|max:80',
            'funcao'=>'string|max:80',
            'atividade'=>'string|max:120',
            'dataInE'=>'',
            'dataTermE'=>'',
            
            //cargos
            'cargo_id'=>'required'
        ];
    }
}
