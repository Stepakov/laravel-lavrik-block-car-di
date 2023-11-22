<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

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
            'text' => [ 'required', 'string', 'min:2' ],
            'model' => [ 'required', 'string' ],
            'model_id' => [ 'required', 'integer' ]
        ];
    }

    public function checkData()
    {
        $model = $this->model;
//        $this->model = config( "comments.$model" );

//        dd( array_key_exists( $this->model, config( 'comments' ) ), $this->model );

        if( ! array_key_exists( $this->model, config( 'comments' ) ) )
        {
            throw ValidationException::withMessages([
                'text' => 'Wrong model'
            ]);
        }

        $this->model = config( "comments.$model" );
//        dd( 'here' );
        $model = $this->model::findOrFail( $this->model_id );

        return $model;
    }
}
