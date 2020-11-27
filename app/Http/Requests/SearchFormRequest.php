<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cliente' => 'required|min:3|max:100',
            'vendedor' => 'required|min:3|max:100',
            'data_inicial' => 'required',
            'data_final' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório.',
            'max' => 'Valor máximo de caracteres excedido.',
            'numeric' => 'precisa ser apenas números',
        ];
    }
}
