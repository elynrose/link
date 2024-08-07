<?php

namespace App\Http\Requests;

use App\Models\Social;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSocialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_edit');
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
            'facebook' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'linked_in' => [
                'string',
                'nullable',
            ],
            'pinterest' => [
                'string',
                'nullable',
            ],
            'threads' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'tiktok' => [
                'string',
                'nullable',
            ],
            'footer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
