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
            'slug' => ['required', Rule::unique('cats')->ignore($this->cat)],
            'fiv' => ['required', 'in:positive,negative'],
            'gender' => ['required', 'in:male,female'],
            'description' => ['required', 'min:10', 'max:150'],
            'colour' => ['required', 'in:grey,orange,black'],
            'temperament' => ['required', 'in:shy,average,confident'],
            'size' => ['required', 'in:small,medium,large'],
            'status' => ['required', 'in:avaliable,adopted'],
            'fee' => ['required', 'min:50', 'max:1000'],
            'fur' => ['required', 'in:short,long'],
            'desexed' => ['required', 'in:yes,no'],
            'wormed' => ['required', 'in:yes,no'],
            'age' => ['required', 'in:male,female'],
            'adopted_by' => ['required', 'in:DSH,non-DSH'],
            'breed' => ['required', 'in:DSH,non-DSH'],
            'image' => ['required'],

        ];
    }
};
