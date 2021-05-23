<?php

namespace App\Http\Requests;

use App\Models\Producer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProducerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('producer_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:producers',
            ],
            'description' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
        ];
    }
}
