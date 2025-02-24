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
            'destination' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'domains_id' => [
                'required',
                'integer',
            ],
            'custom_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
