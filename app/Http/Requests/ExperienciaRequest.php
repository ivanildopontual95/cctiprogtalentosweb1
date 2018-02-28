<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienciaRequest extends FormRequest
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
            'aptidao.required'=>'Informe a suas Característica',
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
           'empresa'=>'required|string|max:80',
           'funcao'=>'required|string|max:80',
           'atividade'=>'required|string|max:120',
           'dataInE'=>'required',
           'dataTermE'=>'required',
           'instituicao'=>'required|string|max:80',
           'curso'=>'required|string|max:80',
           'dataInI'=>'required',
           'dataTermI'=>'required',
           'cargaHora'=>'required|numeric',
           'aptidao'=>'required|string|max:200'
        ];
    }
}
