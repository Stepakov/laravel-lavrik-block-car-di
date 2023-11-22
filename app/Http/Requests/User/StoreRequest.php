<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
            'email' => [ 'required', 'email', Rule::exists( 'users', 'email' ) ],
            'password' => [ 'required', 'string' ],
            'remember' => [ 'nullable', 'string' ]
        ];
    }

    public function checkCredentials()
    {

        if( ! Auth::attempt( [ 'email' => $this->email, 'password' => $this->password ], $this->boolean( 'remember' ) ) )
        {
            throw ValidationException::withMessages([
                'email' => 'Wrong email or password',
                'password' => 'Wrong email or password',
            ]);
        }
    }
}
