<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categori_id' => ['required', 'numeric', 'exists:categories,id'],
            'provider_id' => ['required', 'numeric', 'exists:providers,id'],
            'name' => ['required', 'string', 'min:3'],
            'code' => ['required', 'string', 'min:3'],
            'brand' => ['required', 'string', 'min:3'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'is_check_id' => ['required', 'boolean'],
            'is_check_server' => ['required', 'boolean'],
            'is_check_name' => ['required', 'boolean'],
            'faq' => ['nullable', 'array'],
            'faq.*.id' => ['required', 'numeric'],
            'faq.*.question' => ['required', 'string', 'min:5'],
            'faq.*.answer' => ['required', 'string', 'min:10'],
        ];
    }

    public function attributes(): array
    {
        return [
            'faq.*.question' => 'pertanyaan FAQ',
            'faq.*.answer'   => 'jawaban FAQ',
            'categori_id'    => 'kategori',
        ];
    }
}
