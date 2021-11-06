<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => ['required','string','max:255'],
                'username' => ['required','string','max:255'],
                'email' => ['required','string','max:255','unique:users'],
                'phone' => ['nullable','string','max:255'],
                'password' => $this->passwordRules(),
        ];
    }
}