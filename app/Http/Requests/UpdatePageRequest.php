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
            'link_id' => [
                'required',
                'integer',
            ],
            'page_title' => [
                'string',
                'required',
            ],
            'keywords' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'required',
            ],
            'footer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
