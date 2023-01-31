<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogFilterRequest extends FormRequest
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
            "serviceNames" => 'nullable|string',
            "statusCode" => 'nullable|string',
            "startDate" => 'nullable|date',
            "endDate" => 'nullable|date',
        ];
    }
    public function messages()
    {
        return [
            'serviceNames.nullable' => 'serviceNames must be string, could be null',
            'statusCode.nullable' => 'serviceNames must be string, could be null',
            'startDate.date' => 'startDate must be date, could be null',
            'endDate.date' => 'endDate must be date, could be null',
        ];
    }
}
