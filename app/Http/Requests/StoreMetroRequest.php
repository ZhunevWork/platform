<?php

namespace App\Http\Requests;

use App\Models\Metro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMetroRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('metro_create');
    }

    public function rules()
    {
        return [
            'station' => [
                'string',
                'nullable',
            ],
        ];
    }
}
