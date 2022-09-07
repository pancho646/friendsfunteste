<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            //
            'nome' => 'required|min:2',
            'sobrenome' => 'required|min:2',
            'rg' => 'required',
            'telefone' => 'required|min:10|max:11',
            'email' => 'required|email:rfc',
            'cep' => 'required|min:8|max:8',
            'rua'  => 'required',
            'numero' => 'required',
            'barrio' => 'required',
            'cidade' => 'required',
        ];
    }
    public function messages(){
        return [
            'nome.*'=>'O campo nome é obrigatorio',
            'sobrenome.*'=>'O campo sobrenome é obrigatorio',
            'rg.*'=>'O campo rg é obrigatorio',
            'telefone.*'=>'O campo telefone é obrigatorio e dev ter o formato (ddd)+ 8 ou 9 digitos',
            'email.require'=>'O campo email é obrigatorio',
            'email.rfc'=>'ooops',
            'cep.*'=>'O campo cep é obrigatorio y deve ter 8 digitos',
            'rua.*'=>'O campo rua é obrigatorio',
            'numero.*'=>'O campo numero é obrigatorio',
            'barrio.*'=>'O campo barrio é obrigatorio',
            'cidade.*'=>'O campo cidade é obrigatorio',
        ];
    }
}
