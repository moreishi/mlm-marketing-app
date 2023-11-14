<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\UnauthorizedFormException;
use Symfony\Component\HttpFoundation\Response;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ];
    }

    protected function failedAuthorization()
    {
        $e = new UnauthorizedFormException('Unauthorized');
        throw $e->withStatus(Response::HTTP_UNAUTHORIZED);
    }
}
