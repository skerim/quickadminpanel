<?php

namespace App\Http\Requests;

use App\Models\Crane;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCraneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crane_edit');
    }

    public function rules()
    {
        return [
            'type_id' => [
                'required',
                'integer',
            ],
            'producer_id' => [
                'required',
                'integer',
            ],
            'sn' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:cranes,sn,' . request()->route('crane')->id,
            ],
            'year' => [
                'string',
                'min:4',
                'max:4',
                'required',
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
            'color' => [
                'string',
                'min:3',
                'max:20',
                'nullable',
            ],
            'max_load' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
