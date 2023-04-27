<?php

namespace App\Http\Requests;

use App\Models\Servi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('servi_edit');
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
