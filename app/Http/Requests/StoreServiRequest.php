<?php

namespace App\Http\Requests;

use App\Models\Servi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('servi_create');
    }

    public function rules()
    {
        return [
            'crane_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
