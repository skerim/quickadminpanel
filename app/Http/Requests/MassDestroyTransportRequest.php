<?php

namespace App\Http\Requests;

use App\Models\Transport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:transports,id',
        ];
    }
}
