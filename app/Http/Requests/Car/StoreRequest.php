<?php

namespace App\Http\Requests\Car;

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
            'brand_id' => [ 'required', 'integer', 'exists:brands,id' ],
            'model' => [ 'required', 'string', 'min:1', 'max:10' ],
            'price' => [ 'required', 'integer', 'multiple_of:1000' ],
            'transmission' => [ 'required', 'integer', $this->transmissionExistsRule() ],
            'vin' => [ 'required', 'string', 'min:2', $this->uniqueVin() ],
            'tags' => [ 'nullable', 'array' ],
            'tags.*' => [ 'nullable', 'integer' ]
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'content' => 'Контент',
        ];
    }

    protected function transmissionExistsRule()
    {
        return Rule::in( array_keys( config( 'app-car.transmissions' ) ) );
    }

    protected function uniqueVin()
    {
        return Rule::unique( 'cars', 'vin' )->withoutTrashed();
    }
}
