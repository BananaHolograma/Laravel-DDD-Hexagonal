<?php

namespace Warefy\Shops\Infrastructure\Laravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopFormRequest extends FormRequest
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
