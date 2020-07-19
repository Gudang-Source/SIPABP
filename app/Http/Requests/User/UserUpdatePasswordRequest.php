<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePasswordRequest extends FormRequest
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
            'old_password' => ['required', 'present', 'password:web'],
            'new_password' => ['required', 'present', 'alpha_num', 'max:32', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'present']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'password' => ':attribute salah',
            'present' => ':attribute harus tersedia',
            'alpha_num' => ':attribute hanya boleh alphanumeric',
            'max' => 'panjang :attribute maksimal :size',
            'min' => 'panjang :attribute minimal :size',
            'confirmed' => ':attribute confirmation tidak sesuai'
        ];
    }
}
