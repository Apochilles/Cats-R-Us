<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreCatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:20'],
            // 'slug' => ['required', 'unique:cats,slug' . $this->cat->id],
            'slug' => ['required', Rule::unique('cats')->ignore($this->cat)],
            'fiv' => ['required', 'in:positive,negative'],
            'gender' => ['required', 'in:male,female'],
            'description' => ['required', 'min:10', 'max:150'],
            'colour' => ['required', 'in:grey,orange,black'],
            'temperament' => ['required', 'in:quiet,medium,big'],
            'size' => ['required', 'in:small,medium,large'],

        ];
    }
};
