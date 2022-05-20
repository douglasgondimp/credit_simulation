<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulationCreditRequest extends FormRequest
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
            'valor_emprestimo' => 'required|numeric',
            'instituicoes'     => 'nullable|array',
            'convenios'        => 'nullable|array',
            'parcela'          => 'nullable|integer'
        ];
    }

    public function messages()
    {
        return [
            'valor_emprestimo.required' => 'O campo [valor_emprestimo] é obrigatório.',
            'valor_emprestimo.numeric'  => 'O campo [valor_emprestimo] não é do tipo permitido. deverá ser informado valores numéricos.',
            'instituicoes.array'        => 'O campo [instituicoes] não é do tipo permitido. Deverá ser informado um array informando asinstituições',
            'convenios.array'           => 'O campo [convenios] não é do tipo permitido. Deverá ser informado um array informando os convênios.',
            'parcela.integer'           => 'O campo [parcela] não é do tipo permitido. Deverá ser informado valores numéricos inteiros.'
        ];
    }
}
