<?php

namespace App\Http\Requests;

use App\Models\QrCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQrCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_code_create');
    }

    public function rules()
    {
        return [
            'color' => [
                'string',
                'nullable',
            ],
            'size' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bg_color' => [
                'string',
                'nullable',
            ],
            'link_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
