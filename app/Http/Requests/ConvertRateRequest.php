<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConvertRateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $currencies = array_keys(collect(json_decode(config('app.exchangeRate'), true))->get('currencies'));

        return [
            'source' => ['required', 'string', Rule::in($currencies)],
            'target' => ['required', 'string', Rule::in($currencies)],
            'amount' => ['required', 'integer']
        ];
    }
}
