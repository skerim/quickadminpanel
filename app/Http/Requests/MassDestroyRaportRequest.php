<?php

namespace App\Http\Requests;

use App\Models\Raport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRaportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('raport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:raports,id',
        ];
    }
}
