<?php

namespace App\Http\Requests;

use App\Models\Complex;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComplexRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('complex_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:complexes,id',
        ];
    }
}
