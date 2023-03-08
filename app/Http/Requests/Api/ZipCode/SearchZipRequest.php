<?php

namespace App\Http\Requests\Api\ZipCode;

use Illuminate\Foundation\Http\FormRequest;

class SearchZipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'zipcode' => 'required|string|max:8'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
