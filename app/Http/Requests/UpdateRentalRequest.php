<?php

namespace App\Http\Requests;

use App\Models\Rental;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRentalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rental_edit');
    }

    public function rules()
    {
        return [
            'project_id' => [
                'required',
                'integer',
            ],
            'rental_start' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rental_end' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'hp' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lw' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lifting_capacity' => [
                'numeric',
            ],
            'power' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'anchor' => [
                'string',
                'min:0',
                'max:50',
                'nullable',
            ],
            'cross' => [
                'string',
                'min:0',
                'max:50',
                'nullable',
            ],
            'foundation_level' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'name_crane' => [
                'string',
                'min:0',
                'max:25',
                'nullable',
            ],
        ];
    }
}
