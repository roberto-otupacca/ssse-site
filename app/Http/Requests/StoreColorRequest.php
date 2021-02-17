<?php

namespace App\Http\Requests;

use App\Models\Color;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('color_create');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'min:3',
                'required',
                'unique:colors',
            ],
            'css_name' => [
                'string',
                'min:3',
                'required',
            ],
        ];
    }
}
