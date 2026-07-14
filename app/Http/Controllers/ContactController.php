<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactSubmissionRequest;
use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function store(StoreContactSubmissionRequest $request): RedirectResponse
    {
        ContactSubmission::create([
            ...$request->safe()->only([
                'name',
                'institution_name',
                'email',
                'phone',
                'product_interest',
                'message',
            ]),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('status', 'Terima kasih, pesan Anda sudah kami terima. Tim kami akan menghubungi Anda dalam 1x24 jam.');
    }
}
