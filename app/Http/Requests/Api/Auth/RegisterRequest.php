<?php

namespace App\Http\Requests\Api\Auth;

use Faker\Factory;
use App\Data\UserData;
use Spatie\LaravelData\WithData;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class RegisterRequest extends FormRequest
{
    use WithData;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): true
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'max:255', 'min:3'],
            'email'    => ['required', 'email', 'min:5', 'max:255'],
            'password' => ['required', 'confirmed'],
        ];
    }

    protected function dataClass(): string
    {
        return UserData::class;
    }
}

