<?php

namespace App\Http\Requests;

use App\Models\File;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('file_create');
    }

    public function rules()
    {
        return [
            'title'         => [
                'string',
                'min:3',
                'required',
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
            'slug'          => [
                'string',
                'min:2',
                'required',
                'unique:pages',
            ],
        ];
    }
}
