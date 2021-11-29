<?php

namespace App\Http\Requests;

use App\Models\Infrastructure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInfrastructureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('infrastructure_edit');
    }

    public function rules()
    {
        return [
            'address' => [
                'string',
                'nullable',
            ],
            'distance' => [
                'string',
                'nullable',
            ],
        ];
    }
}
