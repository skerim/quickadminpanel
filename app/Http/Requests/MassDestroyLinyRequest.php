<?php

namespace App\Http\Requests;

use App\Models\Liny;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLinyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('liny_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:linies,id',
        ];
    }
}
