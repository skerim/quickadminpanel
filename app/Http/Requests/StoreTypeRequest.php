<?php

namespace App\Http\Requests;

use App\Models\Type;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:types',
            ],
            'type_2' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
        ];
    }
}
