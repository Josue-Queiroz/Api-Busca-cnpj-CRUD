<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnterpriseRequest extends FormRequest
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
        $id = $this->segment(2);

        $rules = [
            'cnpj' => ['required','max:18', Rule::unique('enterprises')->ignore($id)],
            'razao_social' => ['required'],
            'name' => ['required'],
            'cep' => ['required'],
            'Logradouro' => ['required','max:50'],
            'number' => ['required'],
            'email' => 'sometimes|required|email',
            'phone' => ['required','min:14','max:15'],
            'complemento' => ['nullable','max:50'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required','max:2'],
            'segmento' => ['required'],
            'inscricao_municipal' => ['required','min:11'],
            'inscricao_estadual' => ['nullable','min:9'],
        ];

        return $rules;
    }
}
