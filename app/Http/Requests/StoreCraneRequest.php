<?php

namespace App\Http\Requests;

use App\Models\Crane;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCraneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crane_create');
    }

    public function rules()
    {
        return [
            'type_id' => [
                'required',
                'integer',
            ],
            'sn' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:cranes',
            ],
            'producer_id' => [
                'required',
                'integer',
            ],
            'year' => [
                'string',
                'min:4',
                'max:4',
                'nullable',
            ],
            'max_load' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'udt' => [
                'string',
                'min:6',
                'max:12',
                'nullable',
            ],
            'enova' => [
                'string',
                'min:3',
                'max:35',
                'nullable',
            ],
        ];
    }
}
