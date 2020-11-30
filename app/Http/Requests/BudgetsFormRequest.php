<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class BudgetsFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'client' => 'required|min:3|max:100',
            'seller' => 'required',
            'date' => 'required',
            'schedule' => 'required',
            'cost' => 'required|numeric',
            'description' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório.',
            'max' => 'Valor máximo de caracteres excedido.',
            'numeric' => 'precisa ser apenas números e use um ".(ponto)" entre as frações',
        ];
    }
}
