<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAdvertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
            $rules = [
                'item_id' => [
                    'unique:adverts',
                    'max:255'
                ],
                'title' => 'max:255'
            ];

            if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
                $rules['item_id'] = [
                    'required',
                    Rule::unique('adverts')->ignore($this->advert ?? $this->id)
                ];
            }

        return $rules;
    }
}
