<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
            'number'            => 'required',
            'expiration_date'   => 'required',
            'cvv'               => 'required'
        ];
    }

    public function messages()
    {
        return [
            'number.required'           => 'O número do cartão de crédito é obrigatório.',
            'expiration_date.required'  => 'A data de validade é obrigatória.',
            'cvv.required'              => 'O CVV é obrigatório.'
        ];
    }
}
