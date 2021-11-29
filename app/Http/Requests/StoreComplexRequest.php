<?php

namespace App\Http\Requests;

use App\Models\Complex;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreComplexRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('complex_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'area' => [
                'string',
                'nullable',
            ],
            'height' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'stations.*' => [
                'integer',
            ],
            'stations' => [
                'array',
            ],
            'infrastructures.*' => [
                'integer',
            ],
            'infrastructures' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
