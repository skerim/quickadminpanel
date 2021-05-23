<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'name_2' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'city' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'street' => [
                'string',
                'min:3',
                'max:255',
                'nullable',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'array',
            ],
            'enowa' => [
                'string',
                'min:3',
                'max:35',
                'nullable',
            ],
            'customers.*' => [
                'integer',
            ],
            'customers' => [
                'array',
            ],
            'rentals.*' => [
                'integer',
            ],
            'rentals' => [
                'array',
            ],
        ];
    }
}
