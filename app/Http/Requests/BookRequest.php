<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
    public function rules() /** regras que eu quero, tipos de validação  */
    {
        return [
            'title'=>'required',
            'pages'=>'required|numeric'
        ];
    }
    /**
     *  Aqui é um método para personalizarmos as mensagens de erro
     */
    public function messages()
    {
        return[
            'title.required' => 'Coloque o título',
            'pages.numeric' => 'Coloque números para as páginas',
        ];
    }
}
