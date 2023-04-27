<?php

namespace App\Http\Requests;

use App\Models\Crane;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCraneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('crane_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cranes,id',
        ];
    }
}
