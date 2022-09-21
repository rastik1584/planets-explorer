<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LogBookRequest extends FormRequest
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
            'planet_id' => 'required|exists:planets,id',
            'mood' => 'required',
            'weather' => 'required',
            'gps_lat' => 'required',
            'gps_lng' => 'required',
            'note' => 'required',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['error' => $validator->errors()->first()], 422);
        throw new ValidationException($validator, $response);
    }
}
