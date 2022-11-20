<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class ClientSearchRequest
 * @package App\Http\Requests
 */
class ClientSearchRequest extends FormRequest
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
            'searchQuery.departureAirport' => 'required:string|size:3|exists:airports,code',
            'searchQuery.arrivalAirport' => 'required:string|size:3|exists:airports,code',
            'searchQuery.departureDate' => 'required|date_format:Y-m-d',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = response()->json(['error' => $errors->messages()], 400);

        throw new HttpResponseException($response);
    }
}
