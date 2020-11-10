<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'credit_card_id'    => 'required',
            'user_to_id'        => 'required',
            'transaction_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'credit_card_id.required'   => 'O cartão de crédito é obrigatório.',
            'user_to_id'              => 'Informe um amigo para pagamento.',
            'transaction_value'         => 'Informe o valor que deseja efetuar o pagamento'
        ];
    }
}
