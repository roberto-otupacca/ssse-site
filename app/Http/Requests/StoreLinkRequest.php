<?php

namespace App\Http\Requests;

use App\Models\Link;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('link_create');
    }

    public function rules()
    {
        return [
            'pages.*'       => [
                'integer',
            ],
            'pages'         => [
                'array',
            ],
            'title'         => [
                'string',
                'min:3',
                'required',
            ],
            'link'          => [
                'string',
                'min:0',
                'nullable',
            ],
            'display_order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
