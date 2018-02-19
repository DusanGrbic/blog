<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Mail\Welcome_Again;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ];
    }
    
    public function persist() {
        // Create new user
        $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password)
        ]);

        // Login user
        auth()->login($user);

        // Send welcome mail to the newly created user
        \Mail::to($user)->send(new Welcome_Again($user));
    }
}
