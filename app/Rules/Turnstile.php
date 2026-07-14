<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Translation\PotentiallyTranslatedString;

class Turnstile implements ValidationRule
{
    public function __construct(private readonly ?string $remoteIp = null)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret_key');

        if (! $secret) {
            $fail('Verifikasi anti-spam belum dikonfigurasi di server.');

            return;
        }

        if (! is_string($value) || $value === '') {
            $fail('Verifikasi anti-spam gagal, silakan coba lagi.');

            return;
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $secret,
            'response' => $value,
            'remoteip' => $this->remoteIp,
        ]);

        if (! $response->json('success')) {
            $fail('Verifikasi anti-spam gagal, silakan coba lagi.');
        }
    }
}
