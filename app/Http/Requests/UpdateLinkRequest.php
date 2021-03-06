<?php

namespace App\Http\Requests;

use App\Models\Link;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('link_edit');
    }

    public function rules()
    {
        return [
            'title'         => [
                'string',
                'min:3',
                'required',
            ],
            'link'          => [
                'string',
                'min:0',
                'nullable',
                'url',
            ],
            'pages.*'       => [
                'integer',
            ],
            'pages'         => [
                'array',
            ],
            'news.*'        => [
                'integer',
            ],
            'news'          => [
                'array',
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
