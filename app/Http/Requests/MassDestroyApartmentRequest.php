<?php

namespace App\Http\Requests;

use App\Models\Apartment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyApartmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('apartment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:apartments,id',
        ];
    }
}
