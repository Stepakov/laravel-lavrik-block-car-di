<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'title' => [ 'required', 'string', 'min:1', 'max:10', $this->uniqueTitle() ],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Марка',
        ];
    }

    protected function uniqueTitle()
    {
        return Rule::unique( 'brands', 'title' );
    }
}
