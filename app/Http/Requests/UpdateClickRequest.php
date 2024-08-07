<?php

namespace App\Http\Requests;

use App\Models\Click;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClickRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('click_edit');
    }

    public function rules()
    {
        return [
            'link_id' => [
                'required',
                'integer',
            ],
            'click_count' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'source' => [
                'string',
                'nullable',
            ],
            'user_agent' => [
                'string',
                'nullable',
            ],
            'ip_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
