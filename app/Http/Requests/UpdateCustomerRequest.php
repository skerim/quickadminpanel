<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:customers,name,' . request()->route('customer')->id,
            ],
            'name_2' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'nip' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'street' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
        ];
    }
}
