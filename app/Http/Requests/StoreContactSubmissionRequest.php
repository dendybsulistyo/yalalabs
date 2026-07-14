<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactSubmissionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'institution_name' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
            'product_interest' => ['required', 'in:sekolah,klinik,ticket,lainnya'],
            'message' => ['required', 'string', 'min:20', 'max:2000'],

            // Honeypot: field ini disembunyikan lewat CSS, bot form-filler
            // biasanya tetap mengisi semua field yang ada di DOM.
            'website' => ['prohibited'],

            'cf-turnstile-response' => ['required', new Turnstile($this->ip())],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama',
            'institution_name' => 'nama instansi',
            'phone' => 'nomor HP/WA',
            'product_interest' => 'produk yang diminati',
            'message' => 'pesan',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Format nomor HP/WA tidak valid. Gunakan format 08xx, +62xx, atau 62xx.',
            'message.min' => 'Pesan minimal :min karakter, jelaskan kebutuhan Anda secara singkat.',
        ];
    }
}
