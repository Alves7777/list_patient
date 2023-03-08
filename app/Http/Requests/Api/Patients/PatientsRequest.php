<?php

namespace App\Http\Requests\Api\Patients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientsRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "photo" => "required",
            "patient_name" => "required",
            "mother_name" => "required",
            "date_birth" => "required|date:Y-m-d",
            "cpf" => "required|cpf",
            "cns" => "required",
            "zipcode" => "required|number|max:7",
            "number" => "required",
            "supplement" => "sometimes",
        ];

    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            "cpf" => "CPF é obrigatório e tem que ser númerico e de 11 dígitos",
        ];
    }

}
