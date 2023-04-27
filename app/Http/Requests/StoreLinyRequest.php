<?php

namespace App\Http\Requests;

use App\Models\Liny;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLinyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liny_create');
    }

    public function rules()
    {
        return [
            'diameter' => [
                'numeric',
                'required',
            ],
            'dostawca' => [
                'string',
                'nullable',
            ],
            'length' => [
                'numeric',
                'required',
            ],
            'certificate' => [
                'string',
                'nullable',
            ],
            'stan' => [
                'string',
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
        ];
    }
}
