<?php

namespace App\Http\Requests\PricingManagement;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => ['required'],
            'experience' => ['required'],
            'country' => ['required'],
            'offshore' => ['required'],
            'onshore' => ['required'],
        ];
    }
}
