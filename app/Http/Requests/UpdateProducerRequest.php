<?php

namespace App\Http\Requests;

use App\Models\Producer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProducerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('producer_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
                'unique:producers,name,' . request()->route('producer')->id,
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
