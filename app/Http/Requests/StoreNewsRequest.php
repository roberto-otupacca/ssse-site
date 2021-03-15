<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_create');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'title'      => [
                'string',
                'min:3',
                'required',
            ],
            'slug'          => [
                'string',
                'min:2',
                'required',
                'unique:pages',
            ],
            'text'       => [
                'required',
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
