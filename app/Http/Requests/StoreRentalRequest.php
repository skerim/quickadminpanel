<?php

namespace App\Http\Requests;

use App\Models\Rental;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRentalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rental_create');
    }

    public function rules()
    {
        return [
            'cranes.*' => [
                'integer',
            ],
            'cranes' => [
                'required',
                'array',
            ],
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
            'name_crane' => [
                'string',
                'min:0',
                'max:25',
                'nullable',
            ],
        ];
    }
}
