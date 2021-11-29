<?php

namespace App\Http\Requests;

use App\Models\Apartment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('apartment_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price_usd' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price_eur' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'floor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'all_floor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'area' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'number_of_rooms' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'options' => [
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
            'photo' => [
                'array',
            ],
        ];
    }
}
