<?php

namespace App\Http\Requests;

use App\Models\Maintenance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maintenance_edit');
    }

    public function rules()
    {
        return [
            'crane_id' => [
                'required',
                'integer',
            ],
            'maintenance_data' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
