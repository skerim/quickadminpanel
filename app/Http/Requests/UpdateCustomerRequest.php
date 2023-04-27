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
                'string',
                'min:10',
                'max:20',
                'nullable',
            ],
            'code' => [
                'string',
                'min:5',
                'max:6',
                'nullable',
            ],
            'city' => [
                'string',
                'min:3',
                'max:25',
                'nullable',
            ],
            'street' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'phone' => [
                'string',
                'min:5',
                'max:20',
                'nullable',
            ],
            'regon' => [
                'string',
                'min:9',
                'max:9',
                'nullable',
            ],
        ];
    }
}
