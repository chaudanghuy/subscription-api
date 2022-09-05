<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'website_id' => 'required|exists:websites,id'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new \HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => Response::HTTP_BAD_REQUEST,
        ], Response::HTTP_BAD_REQUEST));
    }
}
