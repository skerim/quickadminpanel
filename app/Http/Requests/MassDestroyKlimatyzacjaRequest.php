<?php

namespace App\Http\Requests;

use App\Models\Klimatyzacja;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKlimatyzacjaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('klimatyzacja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:klimatyzacjas,id',
        ];
    }
}
