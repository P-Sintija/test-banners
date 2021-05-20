<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerStorageRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => 'required | url |  unique:banners,url',
            'checkbox' => 'required | size:1',
            'position' => 'required | numeric'
        ];
    }
}
