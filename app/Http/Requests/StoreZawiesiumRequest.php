<?php

namespace App\Http\Requests;

use App\Models\Zawiesium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreZawiesiumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zawiesium_create');
    }

    public function rules()
    {
        return [
            'nr' => [
                'string',
                'nullable',
            ],
            'klasa' => [
                'string',
                'nullable',
            ],
            'expiration_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'load' => [
                'string',
                'required',
            ],
            'length' => [
                'numeric',
            ],
            'type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
