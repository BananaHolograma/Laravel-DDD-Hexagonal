<?php

namespace Warefy\Stores\Infrastructure\Laravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

     public function rules(): array
    {
        return [
            'name' =>'required|string|max:255',
            'url' => 'required|url',
        ];
    }
}
