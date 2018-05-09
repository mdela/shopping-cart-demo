<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoice extends FormRequest
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
            'email' => 'required|unique:users|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'dni' => 'numeric|required|unique:clients',
            'phone' => 'required',
            'street' => 'required',
            'number' => 'required|numeric',
            'floor' => 'max:20',
            'dept' => 'max:20',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
        ];
    }
}
