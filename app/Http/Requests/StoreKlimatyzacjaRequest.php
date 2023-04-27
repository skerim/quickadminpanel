<?php

namespace App\Http\Requests;

use App\Models\Klimatyzacja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKlimatyzacjaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('klimatyzacja_create');
    }

    public function rules()
    {
        return [
            'crane_id' => [
                'required',
                'integer',
            ],
            'model' => [
                'string',
                'required',
            ],
            'data_montazu' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_konserwacji' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
        ];
    }
}
