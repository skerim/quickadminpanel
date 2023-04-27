<?php

namespace App\Http\Requests;

use App\Models\Craneclass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCraneclassRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('craneclass_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:craneclasses',
            ],
        ];
    }
}
