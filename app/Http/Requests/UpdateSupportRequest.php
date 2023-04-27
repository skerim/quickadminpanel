<?php

namespace App\Http\Requests;

use App\Models\Support;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSupportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('support_edit');
    }

    public function rules()
    {
        return [
            'crane_id' => [
                'required',
                'integer',
            ],
            'budowa' => [
                'string',
                'nullable',
            ],
            'region' => [
                'string',
                'nullable',
            ],
        ];
    }
}
