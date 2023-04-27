<?php

namespace App\Http\Requests;

use App\Models\Transport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transport_edit');
    }

    public function rules()
    {
        return [
            'transport' => [
                'required',
            ],
            'budowa' => [
                'string',
                'nullable',
            ],
            'data' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
