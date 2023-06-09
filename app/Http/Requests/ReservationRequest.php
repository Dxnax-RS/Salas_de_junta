<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'boardroom_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
            'start' => 'required|date_format:H:i:s',
            'end' => 'required|date_format:H:i:s',
        ];
    }
}
