<?php

namespace App\Http\Requests;

use App\Models\Raport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRaportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('raport_create');
    }

    public function rules()
    {
        return [
            'crane_sn_id' => [
                'required',
                'integer',
            ],
            'data' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'start' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'stop' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'work' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'engine' => [
                'string',
                'nullable',
            ],
            'gps_kraj' => [
                'string',
                'nullable',
            ],
            'gps_woj' => [
                'string',
                'nullable',
            ],
            'gps_city' => [
                'string',
                'nullable',
            ],
            'gps_ulica' => [
                'string',
                'nullable',
            ],
        ];
    }
}
