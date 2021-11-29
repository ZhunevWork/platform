<?php

namespace App\Http\Requests;

use App\Models\Finishing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFinishingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('finishing_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
