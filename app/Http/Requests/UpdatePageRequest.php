<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'title'         => [
                'string',
                'min:2',
                'required',
            ],
            'slug'          => [
                'string',
                'min:2',
                'required',
                'unique:pages,slug,' . request()->route('page')->id,
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
