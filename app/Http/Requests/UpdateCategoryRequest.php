<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_edit');
    }

    public function rules()
    {
        return [
            'name'          => [
                'string',
                'min:3',
                'required',
                'unique:categories,name,' . request()->route('category')->id,
            ],
            'description'   => [
                'string',
                'min:3',
                'required',
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
